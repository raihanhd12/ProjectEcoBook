<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Penjual;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'first_name' => 'Budi',
            'last_name' => 'Setiawan',
            'email' => 'budi@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'first_name' => 'Raihan',
            'last_name' => 'HD',
            'email' => 'raihanpembeli@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'first_name' => 'Cyclone',
            'last_name' => 'Joker',
            'email' => 'double@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        Admin::create([
            'nama_admin' => 'Al Kausar',
            'email' => 'alka@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        Admin::create([
            'nama_admin' => 'Raihan',
            'email' => 'raihanadmin@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        Penjual::create([
            'first_name' => 'Rando',
            'last_name' => 'Trako',
            'nama_toko' => 'Toko Buku Old',
            'email' => 'rando@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        Penjual::create([
            'first_name' => 'Raihan',
            'last_name' => 'Ganteng',
            'nama_toko' => 'Toko Raihan',
            'email' => 'raihanpenjual@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        Penjual::create([
            'first_name' => 'Rabit',
            'last_name' => 'Tank',
            'nama_toko' => 'Toko Best Match',
            'email' => 'build@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        Penjual::create([
            'first_name' => 'Sanjaya',
            'last_name' => 'Wahyani',
            'nama_toko' => 'Toko Buku Cerdas',
            'email' => 'sanjaya@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        Category::create([
            'nama_category' => 'Pemrograman'
        ]);

        Category::create([
            'nama_category' => 'Bahasa'
        ]);

        Category::create([
            'nama_category' => 'Pendidikan'
        ]);

        Category::create([
            'nama_category' => 'Keuangan'
        ]);
    }
}
