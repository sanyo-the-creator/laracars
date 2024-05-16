<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'Alesandro Poole',
            'email' => 'sankopoole@gmail.com'
        ]);

        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);

        // Listing::create([
        //     'title' => 'Porshe Taycan',
        //     'tags' => 'porshe, german',
        //     'company' => 'Porshe',
        //     'email' => 'sanipoole13@gmail.com',
        //     'location' => 'Bratislava',
        //     'description' => 'The Porsche Taycan is a luxury electric sports sedan that blends Porsches performance legacy with advanced electric technology. With its striking design and powerful electric motors, it offers exhilarating performance and efficiency. Inside, it boasts luxury features and cutting-edge tech for a premium driving experience, marking Porsches foray into electric mobility with style and performance.'
        // ]);

        // Listing::create([
        //     'title' => 'Audi rs6',
        //     'tags' => 'audi, german',
        //     'company' => 'Audi',
        //     'email' => 'sankopoole@gmail.com',
        //     'location' => 'Zilina',
        //     'description' => 'The Audi RS6 is a high-performance luxury sport wagon known for its combination of power, practicality, and luxury. With its aggressive styling, potent engine, and advanced technology, the RS6 embodies Audis commitment to performance and innovation. It offers exhilarating acceleration, precise handling, and a spacious interior with premium materials and advanced features. The RS6 is a versatile vehicle that excels both on the track and in everyday driving situations, making it a popular choice among enthusiasts seeking performance and practicality in one package.'
        // ]);

    }
}
