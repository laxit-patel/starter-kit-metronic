<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use App\Models\Batch;
use App\Traits\Uuids;

class Course extends Model
{
    use HasFactory,HasUUID, Uuids;
    protected $uuidFieldName = 'id';

    public function getBatch()
    {
        return $this->hasMany(Batch::class,'course');
    }
}
