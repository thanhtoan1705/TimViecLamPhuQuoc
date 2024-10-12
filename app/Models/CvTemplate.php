<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'template_name',
        'template_image',
        'template_description',
        'template_content'
    ];

    public function fields()
    {
        return $this->hasMany(CvField::class, 'template_id');
    }

    public function userCvs()
    {
        return $this->hasMany(UserCv::class, 'template_id');
    }

    public function userCvData()
    {
        return $this->hasMany(UserCvData::class, 'template_id');
    }


    public function setTemplateContentAttribute($value)
    {
        if (is_string($value)) {
            // Giải mã HTML trước khi lưu
            $this->attributes['template_content'] = htmlspecialchars_decode(strip_tags($value));
        } else {
            // Xử lý trường hợp khác nếu cần
            $this->attributes['template_content'] = json_encode($value); // hoặc xử lý khác
        }
    }

    public function getTemplateContentAttribute($value)
    {
        return $value; // Trả về nguyên giá trị để hiển thị HTML
    }

}
