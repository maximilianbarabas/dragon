<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    
 
        use HasFactory;
     
        protected $table = "Color";
        protected $primaryKey = "color_Id";
        protected $keyType = "string";
        public $incrementing = false;
        public $timestamps = false;
    
}
