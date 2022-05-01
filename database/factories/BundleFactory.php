<?php

namespace Database\Factories;

use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\bundle>
 */
class BundleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $idTypes = Type::all()->getQueueableIds();
        $complect = [
          'Коробка',
          'Кабель',
          'Диск',
          'Клавиатура',
          'Мышь',
          'Монитор',
        ];
        return [
            'name' => $this->faker->randomElement($complect),
            'type_id' => $this->faker->randomElement($idTypes),
        ];
    }
}
