<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class provider extends Model
{
    protected $table = 'providers';
    protected $fillable = ['name',  'phone', 'email', 'time'];
}
