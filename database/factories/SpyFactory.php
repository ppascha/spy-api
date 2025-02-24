<?php

namespace Database\Factories;

use App\Models\Spy;
use App\Models\Agency;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpyFactory extends Factory
{
    /**
     *
     * @var string
     */
    protected $model = Spy::class;

    /**
     *
     * @return array
     */
    public function definition()
    {
        $agency = Agency::factory()->create();
        return [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'agency_id' => $agency->id,
            'country_of_operation' => $this->faker->country,
            'date_of_birth' => $this->faker->date(),
            'date_of_death' => $this->faker->optional()->date(),
        ];
    }
}
