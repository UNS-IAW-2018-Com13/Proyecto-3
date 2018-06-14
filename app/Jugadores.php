<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Jugadores extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'Jugadores';
    
    
}
