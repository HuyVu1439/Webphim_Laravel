<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
	public $timestamps = false;
    use HasFactory;
    protected $table = 'film';
    protected $fillable = [
    	'title', 'description', 'image'
    ];
  	public function category(){
  		return $this->belongsTo(Category::class,'category_id');
  	}
  	public function genre(){
  		return $this->belongsTo(Genre::class,'genre_id');
  	}
    public function country(){
      return $this->belongsTo(Country::class,'country_id');
    }

    public function film_genre(){
      return $this->belongsToMany(Genre::class,'film_genre','film_id','genre_id');
    }
    public function episode(){
      return $this->hasMany(Episode::class);
    }

}
