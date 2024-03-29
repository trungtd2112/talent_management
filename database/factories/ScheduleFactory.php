<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'schedule_name' => $this->faker->company(),
            'date' => $this->faker->date(),
            'location' => $this->faker->address(),
            'information' => $this->faker->text(),
        ];
    }
}
