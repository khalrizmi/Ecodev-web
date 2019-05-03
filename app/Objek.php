<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objek extends Model
{
    protected $fillable = ['category_id','survey_id','member_id','name','description','photo','verified'];
}
