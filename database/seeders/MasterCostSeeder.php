<?php

namespace Database\Seeders;

use App\Models\MasterCost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterCostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasterCost::factory()->count(22)->sequence(
            ['name' => 'Kayu'],
            ['name' => 'Hangkel'],
            ['name' => 'B 9149 UCT'],
            ['name' => 'B 9153 UCT'],
            ['name' => 'B 9877 UCS'],
            ['name' => 'B 9980 VCA'],
            ['name' => 'B 9354 SCH'],
            ['name' => 'B 9828 BCU'],
            ['name' => 'MOTOR'],
            ['name' => 'E-TOL (JALUR KOTA 2 MOBIL)'],
            ['name' => 'Parkir Kyriad'],
            ['name' => 'Listrik'],
            ['name' => 'Pulsa HP Kantor'],
            ['name' => 'Parfum'],
            ['name' => 'Hanger'],
            ['name' => 'Plastik'],
            ['name' => 'Bill Guest, Linen, Surat Jalan'],
            ['name' => 'Camichal'],
            ['name' => 'Service Mesin / Kendaraan'],
            ['name' => 'Alat Mesin / ATK'],
            ['name' => 'Lain-Lain'],
        )->create();
    }
}
