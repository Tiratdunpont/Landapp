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
        factory(App\Entity::class, 500)->create()->each(function($u, $b,$c) {
            $u->details()->save(factory(App\Details::class)->make());
            $b->balances()->save(factory(App\Balance::class)->make());
            $c->contracts()->save(factory(App\Contract::class)->make());
        });
    }
}
