<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'first_name', 'last_name', 'street', 'plz', 'city'];





}
    //Accessor
   /* public function getStreetAttribute($key)
    {
         $value = $key == null ? 'unknown street' : $key;
            return $value;
       /* if($key==null){
            return "No Street";
        }else{
            return $key;
        }*/

    //Mutator
    /*public function setStreetAttribute($key)
    {
        $this->attributes['street'] = $key."My Street";
    }*/

