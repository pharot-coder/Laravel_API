<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //
    protected $table = 'tblperson';
    protected $primaryKey = 'personid';
    public $timestamps;
}