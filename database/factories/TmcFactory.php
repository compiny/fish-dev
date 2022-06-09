<?php

namespace Database\Factories;

use App\Models\Tmc;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tmc>
 */
class TmcFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $cats = Tmc::where('is_cat', true)->get()->getQueueableIds();

        return [
            'name' => $this->faker->text(20),
            'note' => $this->faker->text(50),
            'is_cat' => $this->faker->numberBetween(0, 1),
            'cat_id' => $this->faker->randomElement($cats),
        ];
    }
}
