<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\HasUserAvatar;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class User extends Authenticatable implements HasAvatar, FilamentUser
{
    use HasFactory, Notifiable, HasUserAvatar, HasRoles;
    use LogsActivity;


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'name',
                'email',
                'phone',
                'avatar_url',

            ]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'avatar_url',
        'email',
        'password',
        'phone',
        'remember_token',
        'email_verified_at',
        'role',
        'google_id',
        'facebook_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function employers()
    {
        return $this->hasMany(Employer::class);
    }


    public function employer()
    {
        return $this->hasOne(Employer::class);
    }

    public function userJobPackages()
    {
        return $this->hasMany(UserJobPackage::class, 'user_id');
    }


    // Quan hệ 1-1 với Candidate
    public function candidate(): HasOne
    {
        return $this->hasOne(Candidate::class);
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url ? Storage::url("$this->avatar_url") : null;
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'user_id');
    }

    public function likes()
    {
        return $this->hasMany(CommentLike::class);
    }

    public function canAccessPanel(Panel $panel): bool
    {

        $user = Auth::user();

        if (!$user) {
            return false; // Nếu không có user đăng nhập, từ chối truy cập
        }

        switch ($panel->getId()) {
            case 'admin':
                // Lấy tất cả các role trừ 'employer'
                $adminRoles = Role::where('name', '!=', 'employer')
                    ->pluck('name')
                    ->toArray();

                return $user->hasAnyRole($adminRoles);

            case 'employer':
                // Kiểm tra xem user có role 'employer' không
                return $user->hasRole('employer');

            default:
                return true; // Cho phép truy cập các panel khác
        }
    }
}
