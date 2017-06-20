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
       factory(App\Company::class, 20)->create()->each(
           function($company) {
               factory(App\Land::class)->create(['CompanyName' => $company->CompanyName])->each(
                   function($land) {
                       factory(App\Entity::class)->create()->each(
                           function($entity) use ($land) {
                               factory(App\Balance::class)->create(['UniqueLandNumber' => $land->UniqueLandNumber, 'PersonalNumber' => $entity->PersonalNumber]);
                               factory(App\Details::class)->create(['UniqueLandNumber' => $land->UniqueLandNumber, 'PersonalNumber' => $entity->PersonalNumber]);
                               factory(App\Contract::class)->create(['UniqueLandNumber' => $land->UniqueLandNumber, 'PersonalNumber' => $entity->PersonalNumber]);
                           }
                       );
                   }
               );
           }
       );
    }
}
