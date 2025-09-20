<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['module_id','file_path', 'title'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
