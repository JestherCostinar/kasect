<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Jesther Costinar',
            'email' => 'jesther.jc15@gmail.com'
        ]);

        Listing::factory(6)->create([
            'user_id' => '1'
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Listing::create([
        //     'project_name' => 'Quarantine Pass Generator',
        //     'website' => 'https://www.youtube.com/watch?v=U86HRU3wH7A',
        //     'developer' => 'Jesther Costinar',
        //     'email' => 'jesther.jc15@gmail.com',
        //     'telephone' => '09218989341',
        //     'tags' => 'Java',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        // ]);

        // Listing::create([
        //     'project_name' => 'Kahopes',
        //     'website' => 'https://www.youtube.com/watch?v=q-oqM9dtqSw',
        //     'developer' => 'Jesther Costinar',
        //     'email' => 'jesther.jc15@gmail.com',
        //     'telephone' => '09218989341',
        //     'tags' => 'VB.net',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        // ]);
    }
}
