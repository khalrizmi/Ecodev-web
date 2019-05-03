<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = ['member_id','longtitude','latitude','temperature','sea_level','place_name','address','state','city'];
}
