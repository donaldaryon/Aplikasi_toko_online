<?php

use Illuminate\Database\Seeder;
use App\Alamat_toko;
class Alamat_tokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            ['city_id' => '437','detail' => 'jl.kakatua No 52 RT 010/RW 007 Kec.Kota Soe Kel.Nunumeu Kode Pos : 85511']
        ];
        Alamat_toko::insert($data);
    }
}
