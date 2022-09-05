<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;


class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name' => $this->faker->unique()->name(),
            'image' => $this->faker->image(public_path('Images'), 300 ,300 , null , true),
            'album_id'=>function(){return Album::all()->random();},

        ];
    }
}
