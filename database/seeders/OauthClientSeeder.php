<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OauthClient;


class OauthClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        OauthClient::factory()->count(120)->create();
    }
}
