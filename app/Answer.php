<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public const ACTIONS = [
        'basic' => 'Basic answer',
        'redirect' => 'Redirect to page',
        'derive' => 'Derive to an operator'
    ];

    protected $fillable = ['language_id', 'question', 'answer', 'action', 'parameter'];
}
