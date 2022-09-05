<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = "images";
    public $timestamps = true;

    protected $fillable = ['name' , 'image' , 'album_id' ];


    public function album(){
        return $this->belongsTo(Album::class , 'album_id');
    }
}
