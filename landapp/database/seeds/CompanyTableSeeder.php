<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(App\Company::class, 30)->create()->each(function ($u) {
            $u->lands()->saveMany(factory('App\Land::class')->make());
        });
    }
}
