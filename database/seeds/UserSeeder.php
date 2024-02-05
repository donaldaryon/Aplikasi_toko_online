<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['name' => 'admin',
        'jk' => 'Laki-laki',
        'no_tlp' => '081227974828',
        'email' => 'admin_toko_cendana_@gmail.com',
        'password' => bcrypt('rahasia'),
        'role' => 'admin'];
        User::insert($data);
    }
}
