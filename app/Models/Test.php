<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use BinaryCabin\LaravelUUID\Traits\HasUUID;
use App\Models\Question;
use App\Models\Lesson;

class Test extends Model
{
    use HasFactory, HasUUID, Uuids;
    protected $uuidFieldName = 'id';

    protected $guarded = [];

    public function getQuestions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function getLessons()
    {
        return $this->belongsToMany(Lesson::class);
    }
}
