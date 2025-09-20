<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'package_id',
        'description',
        'image',
        'trainer',
        'duration',
        'content_type',
        'price'
    ];

    protected $casts = [
        'content_type' => 'array',
    ];

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'enrollments')
            ->withPivot('progress', 'completed')
            ->withTimestamps();
    }

    public function contents()
    {
        return $this->hasMany(CourseContent::class)->orderBy('order');
    }
}
