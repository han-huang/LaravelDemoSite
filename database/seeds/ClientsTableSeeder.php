<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Client::count() == 0) {
            Client::create([
                'name'           => 'Alice',
                'email'          => 'alice@example.jp',
                'gender'         => 'F',
                'birthday'       => '1999-09-01',
                'agree_edm'      => 1,
                'password'       => bcrypt('secret'),
                'remember_token' => str_random(60),
            ]);

            Client::create([
                'name'           => 'Bob',
                'email'          => 'bob@example.jp',
                'gender'         => 'M',
                'birthday'       => '1988-08-01',
                'agree_edm'      => 1,
                'password'       => bcrypt('secret'),
                'remember_token' => str_random(60),
            ]);

            Client::create([
                'name'           => 'Carol',
                'email'          => 'carol@example.jp',
                'gender'         => 'F',
                'birthday'       => '1977-07-01',
                'agree_edm'      => 1,
                'password'       => bcrypt('secret'),
                'remember_token' => str_random(60),
            ]);

            Client::create([
                'name'           => 'Wasbook',
                'email'          => 'wasbook@example.jp',
                'gender'         => 'M',
                'birthday'       => '1966-06-01',
                'agree_edm'      => 1,
                'password'       => bcrypt('secret'),
                'remember_token' => str_random(60),
            ]);
        }
    }
}
