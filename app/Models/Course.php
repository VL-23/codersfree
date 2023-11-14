<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $guarded = ['id','status'];
    protected $withCount = ['students','reviews'];

    use HasFactory;

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    public function getRatingAttribute(){
        if( $this->reviews_count ){
            return round($this->reviews->avg('rating'), 1);
        }else{
            return 5;
        }
    }

    // Query Scopes
    public function scopeCategory($query, $category_id){
        if( $category_id )
            return $query->where('category_id', $category_id);
    }

    public function scopeLevel($query, $level_id){
        if( $level_id )
            return $query->where('level_id', $level_id);
    }

    public function getRouteKeyName()
    {
        return "slug";
    }

    // Relación uno a muchos
    public function reviews(){
        return $this->hasMany('App\Models\Review');
        // return $this->hasMany(Review::class);
    }

    public function requirements(){
        return $this->hasMany('App\Models\Requirement');
        // return $this->hasMany(Requirement::class);
    }

    public function goals(){
        return $this->hasMany('App\Models\Goal');
        // return $this->hasMany(Goal::class);
    }

    public function audiences(){
        return $this->hasMany('App\Models\Audience');
        // return $this->hasMany(Audience::class);
    }

    public function sections(){
        return $this->hasMany('App\Models\Section');
        // return $this->hasMany(Section::class);
    }

    // Realción uno a muchos inversa
    public function teacher(){
        return $this->belongsTo('App\Models\User', 'user_id');
        // return $this->belongsTo(User::class, 'user_id');
    }

    public function level(){
        return $this->belongsTo('App\Models\Level');
        // return $this->belongsTo(Level::class);
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
        // return $this->belongsTo(Category::class);
    }

    public function price(){
        return $this->belongsTo('App\Models\Price');
        // return $this->belongsTo(Price::class);
    }

    // Relación muchos a muchos
    public function students(){
        return $this->belongsToMany('App\Models\User');
        // return $this->belongsToMany(User::class);
    }

    // Realción uno a uno polimorfica
    public function image(){
        return $this->morphOne('App\Models\Image','imageable');
        // return $this->morphOne(Image::class,'imageable');
    }

    public function lessons(){
        return $this->hasManyThrough('App\Models\Lesson','App\Models\Section');
        // return $this->hasManyThrough(Section::class,'App\Models\Section');
    }

}
