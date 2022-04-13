<?php

namespace Database\Seeders;

use App\Models\Mahasiswa_MataKuliah;
use Illuminate\Database\Seeder;

class Mahasiswa_MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'mahasiswa_id' => 1,
                'matakuliah_id' => 1,
                'nilai_angka' => 90,
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 1,
                'matakuliah_id' => 2,
                'nilai_angka' => 93,
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 1,
                'matakuliah_id' => 3,
                'nilai_angka' => 99,
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 1,
                'matakuliah_id' => 4,
                'nilai_angka' => 85,
                'nilai_huruf' => 'B',
            ],
            [
                'mahasiswa_id' => 2,
                'matakuliah_id' => 1,
                'nilai_angka' => 90,
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 2,
                'matakuliah_id' => 2,
                'nilai_angka' => 93,
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 2,
                'matakuliah_id' => 3,
                'nilai_angka' => 99,
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 2,
                'matakuliah_id' => 4,
                'nilai_angka' => 85,
                'nilai_huruf' => 'B',
            ],
            [
                'mahasiswa_id' => 3,
                'matakuliah_id' => 1,
                'nilai_angka' => 90,
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 3,
                'matakuliah_id' => 2,
                'nilai_angka' => 93,
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 3,
                'matakuliah_id' => 3,
                'nilai_angka' => 99,
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 3,
                'matakuliah_id' => 4,
                'nilai_angka' => 85,
                'nilai_huruf' => 'B',
            ],
            [
                'mahasiswa_id' => 4,
                'matakuliah_id' => 1,
                'nilai_angka' => 90,
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 4,
                'matakuliah_id' => 2,
                'nilai_angka' => 93,
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 4,
                'matakuliah_id' => 3,
                'nilai_angka' => 99,
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 4,
                'matakuliah_id' => 4,
                'nilai_angka' => 85,
                'nilai_huruf' => 'B',
            ],

            [
                'mahasiswa_id' => 5,
                'matakuliah_id' => 1,
                'nilai_angka' => 90,
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 5,
                'matakuliah_id' => 2,
                'nilai_angka' => 93,
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 5,
                'matakuliah_id' => 3,
                'nilai_angka' => 99,
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 5,
                'matakuliah_id' => 4,
                'nilai_angka' => 85,
                'nilai_huruf' => 'B',
            ],
            [
                'mahasiswa_id' => 6,
                'matakuliah_id' => 1,
                'nilai_angka' => 90,
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 6,
                'matakuliah_id' => 2,
                'nilai_angka' => 93,
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 6,
                'matakuliah_id' => 3,
                'nilai_angka' => 99,
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 6,
                'matakuliah_id' => 4,
                'nilai_angka' => 85,
                'nilai_huruf' => 'B',
            ],

            [
                'mahasiswa_id' => 7,
                'matakuliah_id' => 1,
                'nilai_angka' => 90,
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 7,
                'matakuliah_id' => 2,
                'nilai_angka' => 93,
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 7,
                'matakuliah_id' => 3,
                'nilai_angka' => 99,
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 7,
                'matakuliah_id' => 4,
                'nilai_angka' => 85,
                'nilai_huruf' => 'B',
            ],

        ];

        Mahasiswa_MataKuliah::insert($datas);
    }
}
