<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        
        for ($i = 0; $i < 15; $i++) {
            DB::table('member')->insert([
                'nomor_member' => $faker->unique()->numerify('MB####'),
                'nama_member' => $faker->name,
                'tanggal_lahir' => $faker->date(),
                'tempat_lahir' => $faker->city,
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'alamat' => $faker->address,
                'nomor_ktp' => $faker->unique()->numerify('KTP#######'),
                'nomor_handphone' => $faker->unique()->phoneNumber,
                'pekerjaan' => $faker->jobTitle,
                'status_member' => $faker->randomElement(['Aktif', 'Tidak Aktif']),
                'tanggal_registrasi' => $faker->date(),
                'photo_ktp' => $faker->imageUrl(640, 480, 'people', true, 'Faker'),
                'photo_member' => $faker->imageUrl(640, 480, 'people', true, 'Faker'),
                'nomor_kartu_member' => $faker->unique()->numerify('KM####'),
                'type' => "a",
                'user_id' => 2,
                'username' => "admin",
            ]);
        }
    }
}
