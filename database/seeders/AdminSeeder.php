<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            
                'namaMember' => 'admin',
                'noTelpMember' => '089656578900',
                // 'umurMember' => 21,
                'emailMember' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'fotoMember' => 'foto_member_admin.jpg',
                'admin' => true
            
        ]);
    }
}
