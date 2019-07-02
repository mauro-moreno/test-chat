<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['id', 'name'];

    public $incrementing = false;

    public $timestamps = false;
}
