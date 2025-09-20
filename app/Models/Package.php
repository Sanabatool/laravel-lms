<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description', 'objectives', 'target_audience'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
