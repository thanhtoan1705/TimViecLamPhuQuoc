<?php

namespace App\Models;

use App\Services\ZoomService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Interview extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'job_post_id',
        'employer_id',
        'candidate_id',
        'title',
        'interview_type',
        'location',
        'start_time',
        'duration',
        'description',
        'status',
        'feedback',
        'notes',
        'zoom_meeting_id',
        'zoom_password',
        'zoom_join_url',
        'zoom_start_url',
        'contact_email',
        'contact_phone',
        'color',
        'reminder_sent',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'status' => 'string',
        'interview_type' => 'string',
        'reminder_sent' => 'boolean',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function job_post()
    {
        return $this->belongsTo(JobPost::class, 'job_post_id');
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    // Chức năng interview
    public function save(array $options = []): bool
    {
        $result = parent::save($options);

        // Kiểm tra và xử lý mảng 'job_post_candidates' trước khi đồng bộ vào bảng trung gian
        if (isset($this->attributes['job_post_candidates']) && is_array($this->attributes['job_post_candidates'])) {
            // Chuyển đổi giá trị trong mảng t��� chuỗi thành số nguyên (đảm bảo tính tương thích với MySQL)
            $candidateIds = array_map('intval', $this->attributes['job_post_candidates']);

            // Đồng bộ với bảng trung gian candidate_interviews
            $this->candidates()->sync($candidateIds);
        }

        return $result;
    }

    public function candidates(): BelongsToMany
    {
        return $this->belongsToMany(Candidate::class, 'candidate_interviews', 'interview_id', 'candidate_id');
    }

    // Tạo Zoom meeting khi lưu interview online
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($interview) {
            if (!$interview->employer_id) {
                $interview->employer_id = auth()->user()->employer->id;
            }

            if ($interview->interview_type === 'online') {
                $zoomService = app(ZoomService::class);

                $meetingData = [
                    'topic' => $interview->title,
                    'type' => 2, // Scheduled meeting
                    'start_time' => $interview->start_time->format('Y-m-d\TH:i:s'),
                    'duration' => $interview->duration,
                    'timezone' => 'Asia/Ho_Chi_Minh',
                    'settings' => [
                        'host_video' => true,
                        'participant_video' => true,
                        'join_before_host' => false,
                        'waiting_room' => true,
                    ]
                ];

                try {
                    $zoomMeeting = $zoomService->createMeeting($meetingData);

                    $interview->zoom_meeting_id = $zoomMeeting['id'];
                    $interview->zoom_password = $zoomMeeting['password'];
                    $interview->zoom_join_url = $zoomMeeting['join_url'];
                    $interview->zoom_start_url = $zoomMeeting['start_url'];
                } catch (\Exception $e) {
                    // Log lỗi và xử lý
                    \Log::error('Zoom Meeting Creation Error: ' . $e->getMessage());
                }
            }
        });

        static::saving(function ($interview) {
            if (!$interview->employer_id) {
                $interview->employer_id = auth()->user()->employer->id;
            }
        });
    }

    public function getStatusColorAttribute()
    {
        return $this->time_status === 'completed' ? 'secondary' : 'primary';
    }

    // public function getStatusColorAttribute()
    // {
    //     switch($this->status) {
    //         case 'pending': return 'warning';
    //         case 'completed': return 'success';
    //         case 'cancelled': return 'danger';
    //         default: return 'primary';
    //     }
    // }

    // public function getStatusTextAttribute()
    // {
    //     switch($this->status) {
    //         case 'pending': return 'Chờ phỏng vấn';
    //         case 'completed': return 'Đã hoàn thành';
    //         case 'cancelled': return 'Đã hủy';
    //         default: return 'Không xác định';
    //     }
    // }

    public function getTimeStatusAttribute()
    {
        $endTime = $this->start_time->addMinutes($this->duration);
        $now = now();

        if ($now > $endTime) {
            return 'completed';
        }
        return 'pending';
    }

    public function getStatusTextAttribute()
    {
        return $this->time_status === 'completed' ? 'Đã kết thúc' : 'Sắp diễn ra';
    }

    public function getIsOnlineAttribute()
    {
        return $this->interview_type === 'online';
    }

    public function getIsOfflineAttribute()
    {
        return $this->interview_type === 'offline';
    }
}
