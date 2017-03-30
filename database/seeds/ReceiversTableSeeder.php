<?php

use Illuminate\Database\Seeder;
use App\Receiver;
use App\Client;

class ReceiversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Receiver::count() == 0) {

			$client = Client::where('name', 'Alice')->firstOrFail();
            Receiver::create([
                'name'           => 'Alice',
                'client_id'      => $client->id,
                'phone'          => '0999123999',
                'email'          => 'alice@example.jp',
                'addr_city'      => '台南市',
                'addr_area'      => '安南區',
                'addr_street'    => '安中路１段10號',
                'zipcode'       => 709,
            ]);

			$client = Client::where('name', 'Bob')->firstOrFail();
            Receiver::create([
                'name'           => 'Bob',
                'client_id'      => $client->id,
                'phone'          => '0999123888',
                'email'          => 'bob@example.jp',
                'addr_city'      => '台南市',
                'addr_area'      => '安南區',
                'addr_street'    => '同安路10號',
                'zipcode'       => 709,
            ]);

			$client = Client::where('name', 'Carol')->firstOrFail();
            Receiver::create([
                'name'           => 'Carol',
                'client_id'      => $client->id,
                'phone'          => '0999123777',
                'email'          => 'carol@example.jp',
                'addr_city'      => '台南市',
                'addr_area'      => '安南區',
                'addr_street'    => '海佃路１段10號',
                'zipcode'       => 709,
            ]);

			$client = Client::where('name', 'Wasbook')->firstOrFail();
            Receiver::create([
                'name'           => 'Wasbook',
                'client_id'      => $client->id,
                'phone'          => '0999123666',
                'email'          => 'wasbook@example.jp',
                'addr_city'      => '台南市',
                'addr_area'      => '安南區',
                'addr_street'    => '國安街10號',
                'zipcode'       => 709,
            ]);
        }
    }
}
