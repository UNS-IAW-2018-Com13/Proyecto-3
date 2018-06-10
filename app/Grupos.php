<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Grupos extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'Grupos';
    
    
}
