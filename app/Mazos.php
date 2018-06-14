<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Mazos extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'Mazos';
    
    
}
