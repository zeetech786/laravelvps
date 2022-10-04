<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['IKEA','Sparkasse','DAUD IT SERVICE','ZeeTech GmbH','Nord LB','Ahmadiyya Muslim e.V','BMW Group']),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'street' => $this->faker->streetName (),
            'plz' => $this->faker->numberBetween($min = 1000, $max = 9000),
            'city' => $this->faker->randomElement(['Berlin','Hamburg','Syke','Godshorn','Garbsen','Frankfurt','Rabwah']),

        ];

    }
}
