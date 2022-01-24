<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence,
<<<<<<< HEAD
			'content'=>$this->faker->paragraph,
=======
             'content'=>$this->faker->paragraph,
>>>>>>> UserLIst
        ];
    }
}
