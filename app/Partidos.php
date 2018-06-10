<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Partidos extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'Partidos';
    
    
}
