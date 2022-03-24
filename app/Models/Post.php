<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function categories(){
        return $this->belongsToMany(Category::class, 'post_category');
    }
    public function photo(){
        return $this->belongsTo(Photo::class);
    }
    public function postcomments(){
        return $this->hasMany(Comment::class);
    }
    /**Search functie op de index**/
    /**samengetrokken functie van scope en eigen gekozen filter functie**/
    public function scopeFilter($query, array $filters){
        // if(isset($filters['search']) == false ){} php voor 8

        if($filters['search'] ?? false){ //php 8
            $query
                ->where('title', 'like', '%' .request('search') . '%')
                ->orWhere('body', 'like', '%' .request('search') . '%');
        }
    }
}
