<?php

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
        // $this->call(UserSeeder::class);
        App\User::create([
            'name' => 'Juan Daniel Martinez',
            'email' => 'juan@juandamartinez.com',
            'role' => 'admin',
            'password' => bcrypt('15410596')
        ]);

        App\System::create([
            'name' => 'contpaq'
        ]);

        App\System::create([
            'name' => 'microsip'
        ]);

        App\System::create([
            'name' => 'donfactura'
        ]);

        App\System::create([
            'name' => 'factorum'
        ]);

        factory(App\Client::class, 20)->create();
        factory(App\License::class, 50)->create();
        factory(App\Service::class, 15)->create();
    }
}
