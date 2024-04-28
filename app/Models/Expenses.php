<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Expenses extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getCourse(): HasOne
    {
        return $this->hasOne(Courses::class,'id','course_id');
    }
}
