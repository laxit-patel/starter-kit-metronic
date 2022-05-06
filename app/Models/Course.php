<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use App\Models\Batch;

class Course extends Model
{
    use HasFactory;
    protected $uuidFieldName = 'id';

    public function getBatch()
    {
        return $this->hasMany(Batch::class,'course');
    }
}
