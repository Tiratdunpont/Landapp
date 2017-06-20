<?php

use Illuminate\Database\Seeder;

class LandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Land::class, 20)->create()->each(
            function($Land) {
                factory(App\Details::class)->create(['UniqueLandNumber' => $Land->UniqueLandNumber]);
                factory(App\Balance::class)->create(['UniqueLandNumber' => $Land->UniqueLandNumber]);
                factory(App\Contract::class)->create(['UniqueLandNumber' => $Land->UniqueLandNumber]);
            }
        );
    }
}
