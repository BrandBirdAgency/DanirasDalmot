<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $teamImages = [
            '/storage/images/team/team1.jpg',
            '/storage/images/team/team2.jpg',
            '/storage/images/team/team3.jpg',
            '/storage/images/team/team4.jpg',
            '/storage/images/team/Sagar Chettri1633783464.png',
        ];
        
        return [
            'name' => $this->faker->name(),
            'position' => $this->faker->randomElement([
                'CEO',
                'Chairman',
                'Sr. Programmer',
                'Marketing Manager',
                'Sales Executive',
                'Product Manager',
                'Quality Assurance',
                'Operations Manager',
                'Finance Manager'
            ]),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'photo' => $this->faker->randomElement($teamImages),
            'facebook' => 'https://fb.com/' . $this->faker->userName(),
            'instagram' => 'https://instagram.com/' . $this->faker->userName(),
            'team_id' => $this->faker->optional()->numberBetween(1, 5),
        ];
    }
}
