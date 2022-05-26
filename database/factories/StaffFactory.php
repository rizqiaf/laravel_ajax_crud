<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'nik' => $this->faker->randomNumber(5,true),
            'jabatan' => $this->faker->jobTitle(),
            'alamat' => $this->faker->address(),
            'no_tlp' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
        ];
    }
}
