<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscriptions')->insert([
            'nama_paket' => 'Basic Plan',
            'harga_paket' => 150000,        
        ]);

        DB::table('subscriptions')->insert([
            'nama_paket' => 'Premium Plan',
            'harga_paket' => 300000,        
        ]);

        DB::table('subscriptions')->insert([
            'nama_paket' => 'Pro Plan',
            'harga_paket' => 450000,        
        ]);
    }
}
