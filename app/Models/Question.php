<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use BinaryCabin\LaravelUUID\Traits\HasUUID;


class Question extends Model
{
    use HasFactory, HasUUID, Uuids;
    protected $uuidFieldName = 'id';

    protected $guarded = [];

    public function getType()
    {
        return $this->hasOne(QuestionType::class,'id','type');
    }

    public function getLesson()
    {
        return $this->hasOne(Lesson::class,'id','lesson');
    }

    public function options()
    {
        return $this->hasMany(Option::class,'question','id')->orderBy('letter');
    }
}
