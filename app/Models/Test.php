<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use BinaryCabin\LaravelUUID\Traits\HasUUID;

class Test extends Model
{
    use HasFactory, HasUUID, Uuids;
    protected $uuidFieldName = 'id';
}
