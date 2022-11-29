<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $paragraphs = $this->faker->paragraphs(rand(2, 8));
        $content = "";
        foreach($paragraphs as $para) {
            $content .= "<p>{$para}</p>";
        }
        return [
            'title' => $this->faker->realText(50),
            'content' => $content,
            'category_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7]),
            'status' => $this->faker->randomElement([0, 1])
        ];
    }
}
