<?php

use Illuminate\Database\Seeder;

class NhanVienSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=0;$i<5;$i++){
           $nhanVien=[
               [
               'nv_hoten' => $faker->name,
               'nv_sdt' => $faker->phoneNumber,
               'username' => 'ngochan'.rand(1,999),
               'password' => Hash::make(123),
               'q_id' => 1
               ]

           ];
           $addNhanVien=DB::table('nhanvien')->insert($nhanVien);
        }
    }
}
