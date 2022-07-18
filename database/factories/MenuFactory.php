<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()

    {
        return [
            'name' => $this->faker->name(),
            'parent_id'=> Menu::query()->inRandomOrder()->value('id'),
            'content' => $this->faker->text(200),
            'description' => $this->faker->name(200),
            'active' => $this->faker->boolean(),    
        ];
    }
}
