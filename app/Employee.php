<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $table = 'employees';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['Name', 'age', 'address', 'phone'];

    
}
