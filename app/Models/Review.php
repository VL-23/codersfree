<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $guarded = ['id'];

    use HasFactory;

    // Relación uno a muchos inversa
    public function user(){
        return $this->belongsTo('App\Models\User');
        // return $this->belongsTo(User::class);
    }

    public function course(){
        return $this->belongsTo('App\Models\Course');
        // return $this->belongsTo(Course::class);
    }

}
