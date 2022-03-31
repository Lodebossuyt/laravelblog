<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use HasFactory, softDeletes;

    /*protected $fillable=[
        'file',
    ];*/

    protected $guarded=['id'];
    protected $uploads= '/img/';

    //attribute functie werkt alleen als File bestaat en dit bestaat via $guarded, of via $fillable
    //get{property}Attribute
    //als je file aanspreekt wordt getFileAttribute gebruikt en retourneert hij eigelijk iest anders!! , SUPER HANDIG
   /* public function getFileAttribute($photo){
        return $this->uploads . $photo;
    }*/
}
