<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Jugador extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'Jugadores';
    
    
}
