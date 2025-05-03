<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $users = User::create([
            'name' => 'LABO',
            'surname' => 'CITOYENNETES',
            'nickname' => 'superadmin',
            'email' => 'burkina@laboratoire-citoyennetes.org',
            'password' => bcrypt('super@dmin2023!'),
            'remember_token' => Str::random(10),
            'last_activity' => now(),
            ]);
        $users->roles()->attach(1);
 	$this->call(Regionseeder::class);
	$this->call(Provinceseeder::class);
       
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
