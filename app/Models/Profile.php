<?php

namespace App\Models;

use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Country,State,City};

class Profile extends Model
{
    use HasFactory, HasUUID;
    protected $uuidFieldName = 'id';
    public $incrementing = false;

    public function getCountry()
    {
        return $this->hasOne(Country::class,'id','country');
    }

    public function getState()
    {
        return $this->hasOne(State::class,'id','state');
    }

    public function getCity()
    {
        return $this->hasOne(City::class,'id','city');
    }

    public function getBatch()
    {
        return $this->hasOne(Batch::class, 'id','batch');
    }
}
