<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Mazo extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'Mazos';
    
    
}
