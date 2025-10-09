<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the real team member from SQL dump
        Team::create([
            'name' => 'Sagar Chettri',
            'position' => 'Sr. Programmer',
            'phone' => '9856455673',
            'address' => 'Kathmandu, Nepal',
            'photo' => '/storage/images/team/team1.jpg',
            'facebook' => 'https://fb.com/sagarchettri',
            'instagram' => 'https://instagram.com/sagarchettri',
            'team_id' => 1,
        ]);

        // Create additional team members using factory
        Team::factory(8)->create();
    }
}
