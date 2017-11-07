<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
     
    protected $table='User_Score';
    
    public $primaryKey='Game_ID';
    
    public $timestamp=true;
}
