<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::query()->insert([
            'name' => 'Lộc',
            'username' => 'admin',
            'password' => '123456'
        ]);
        Admin::query()->insert([
            'name' => 'Long',
            'username' => 'superadmin',
            'password' => '123456',
            'level' => '1'
        ]);
    }
}
