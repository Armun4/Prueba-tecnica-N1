<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->streetName(),
            'price' => $this->faker->isbn13(),
            'location' => $this->faker->word(),
            'operationType' => $this->faker->word(),
            'type' => $this->faker->word(),
            'rooms' => $this->faker->randomDigit(),
            'baths' => $this->faker->randomDigit(),
            'agencyID' => $this->faker->unique()->ean13()
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */

}
