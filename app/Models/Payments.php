<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payments extends Model
{
    use HasFactory;

    public function getCourse():HasOne
    {
        return $this->hasOne(Courses::class,'id','course_id');
    }
    public function getStudent():HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
