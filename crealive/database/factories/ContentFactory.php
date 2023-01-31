<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Content>
 */
class ContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'categoryId'=>random_int(1,10),
            'title'=>fake()->text(10),
            'content'=>fake()->text(300),
            'isActive'=>fake()->boolean,
            //
        ];
    }
}
