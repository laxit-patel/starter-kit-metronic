<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Question extends Model
{
    use HasFactory, HasUUID, Uuids;
    protected $uuidFieldName = 'id';

    public function getType()
    {
        return $this->hasOne(QuestionType::class,'id','type');
    }

    public function options()
    {
        return $this->hasMany(Option::class,'question','id');
    }
}
