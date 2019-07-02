<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['language_id', 'question', 'answer', 'action', 'parameter'];
}
