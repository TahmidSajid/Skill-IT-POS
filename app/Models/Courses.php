<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Courses extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getCategory(): HasOne
    {
        return $this->hasOne(Categories::class,'id','category_id');
    }
}
