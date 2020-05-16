<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';

    protected $fillable = ['name','job','gender']; //bisa pake ini
    //atau
    //protected $guarded = []; 
}
