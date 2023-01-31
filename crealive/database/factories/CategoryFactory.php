<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categoryName=fake()->text(10);
        $randArray=[null,null,null,null,1,2,3,4,5,6,7,8,9,10];
        return [
            'categoryName'=>$categoryName,
            'slug'=>Str::slug($categoryName,"-"),
            'parentId'=>$randArray[array_rand($randArray)],
            //
        ];
    }
}
