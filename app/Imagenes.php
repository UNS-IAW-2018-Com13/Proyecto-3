<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Imagenes extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'Imagenes';
   
}
