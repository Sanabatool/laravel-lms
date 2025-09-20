<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = ['module_id', 'title', 'questions'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    // Quiz.php
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    // Question.php
    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
