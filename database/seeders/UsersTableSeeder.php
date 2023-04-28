<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Allen',
            'email' => 'mthalentadeha@gmail.com',
            'password' => Hash::make('th4l3nt4d3h4'),
        ]);

        // DB::table('users')->insert([
        //     'name' => 'Allen',
        //     'email' => 'mthalentadeha@gmail.com',
        //     'password' => Hash::make('th4l3nt4d3h4'),
        // ]);
    }
}
