<?php

use Illuminate\Database\Seeder;
use App\Rekening;
class RekeningTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['bank_name' => 'BNI','atas_nama'=>'Donald Aryon Alle','no_rekening'=>'097656722']
        ];
        Rekening::insert($data);
    }
}
