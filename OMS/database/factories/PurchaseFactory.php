<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date'=>$this->faker->date,
            'condition'=>'good',
            'quantity'=>'20',
            'totalprice'=>'1000',
            'priceperunit'=>'100',
            'categoryid'=>rand(1,5),
            'subcategoryid'=>rand(1,5),
            'brandid'=>rand(1,5),

        ];
    }
}
