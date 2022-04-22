<?php

namespace Database\Factories;

use App\Models\Bundle;
use App\Models\Type;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $idVendors = Vendor::all()->getQueueableIds();
        $idTypes = Type::all()->getQueueableIds();
        $idBundles = Bundle::all()->getQueueableIds();
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(50),
            'troubles' => $this->faker->text(50),
            'vendor_id' => $this->faker->randomElement($idVendors),
            'type_id' => $this->faker->randomElement($idTypes),
            'bundle_id' => $this->faker->randomElement($idBundles),
        ];
    }
}
