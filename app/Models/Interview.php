<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Interview extends Model
{
    use HasFactory;
    protected $fillable = [
        'candidate_id',
        'job_id',
        'employer_id',
        'name',
        'phone',
        'email',
        'time',
        'viewer',
        'location',
        'status',
        'interview_feeback',
        'start_at',
        'end_at',
        'color',
        'job_post_candidates',
        'note',
    ];

    protected $casts = [
        'job_post_candidates' => 'array',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function job_post()
    {
        return $this->belongsTo(JobPost::class, 'job_id');
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
            // Chuyển đổi giá trị trong mảng từ chuỗi thành số nguyên (đảm bảo tính tương thích với MySQL)
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




}
