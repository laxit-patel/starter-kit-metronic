<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use BinaryCabin\LaravelUUID\Traits\HasUUID;
use App\Models\Course;

class Subject extends Model
{
    use HasFactory, HasUUID, Uuids;
    protected $uuidFieldName = 'id';

    public function getCourse()
    {
        return $this->hasOne(Course::class,'id','course');
    }
}
