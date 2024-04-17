<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Enrollments extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getStudent():HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function getCourse():HasOne
    {
        return $this->hasOne(Courses::class,'id','course_id');
    }
}
