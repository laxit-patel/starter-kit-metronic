<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use BinaryCabin\LaravelUUID\Traits\HasUUID;

class Lesson extends Model
{
    use HasFactory, HasUUID, Uuids;
    protected $uuidFieldName = 'id';

    public function getSubject()
    {
        return $this->hasOne(Subject::class,'id','subject');
    }
}
