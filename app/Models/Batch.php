<?php

namespace App\Models;

use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Batch extends Model
{
    use HasFactory, HasUUID;
    protected $uuidFieldName = 'id';

    public function getCourse()
    {
        return $this->hasOne(Course::class,'id','course');
    }
}
