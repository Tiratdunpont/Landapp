<?php

use Illuminate\Database\Seeder;

class EntityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entity::class, 20)->create()->each(
            function($Entity) {
                factory(App\Details::class)->create(['PersonalNumber' => $Entity->PersonalNumber]);
                factory(App\Balance::class)->create(['PersonalNumber' => $Entity->PersonalNumber]);
                factory(App\Contract::class)->create(['PersonalNumber' => $Entity->PersonalNumber]);
            }
        );
    }
}
