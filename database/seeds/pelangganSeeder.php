<?php

use Illuminate\Database\Seeder;

class pelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Pelanggan::class, 30)->create();
    }
}
