<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = "albums";
    public $timestamps = true;

    protected $fillable = ['name' ];

    public function images(){
        return $this->hasMany(Image::class , 'album_id');
    }
}
