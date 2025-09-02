<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\table;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     DB::table('admins')->insert([
        [
            'nom'=>'imane',
            'email'=>'saoudeiman@gmail.com',
            'mode_de_passe'=>Hash::make('12345678')
        ]
        ]);
    }
}
