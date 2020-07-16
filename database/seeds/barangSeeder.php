<?php

use Illuminate\Database\Seeder;
use App\Barang;

class barangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Barang::class, 30)->create();
    }
}
