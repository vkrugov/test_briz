<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * @return array
     */
    public function definition()
    {
        return [
            'phone' => '+380' . rand(111111111, 999999999),
            'name' => $this->faker->name(),
        ];
    }
}
