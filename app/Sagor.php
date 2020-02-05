<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sagor extends Model
{

    protected $table = 'sagors';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['name', 'email'];

    
}
