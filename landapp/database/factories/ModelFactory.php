<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Company::class, function (Faker\Generator $faker) {
    return [
        'CompanyName' => $faker->unique()->word
    ];
});
$factory->define(App\Land::class, function (Faker\Generator $faker) {
    return [
        'UniqueLandNumber' => $faker->unique()->numberBetween(1000000000, 9999999999),
        /*'CompanyName' => $factory->create(App\Company::class)->CompanyName,*/
        'Status' => $faker->word,
        'LandArea' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max=100),
        'SoilProductivityScore' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max=100),
        'RegisteredInRC' => $faker->date($format =  'Y-m-d'),
        'RegisterNumber' => $faker->word,
        'GivenInChange' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max=100),
        'PlotUnderRealState' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max=100),
        'LocationLand' => $faker->word
    ];
});
$factory->define(App\Entity::class, function (Faker\Generator $faker) {
    return [
        'PersonalNumber' => $faker->unique()->numberBetween(100000000, 999999999),
        'Name' => $faker->word,
        'Surname' => $faker->word,
        'Phone' => $faker->numberBetween(600000000, 700000000),
        'OtherContactInformation' => $faker->text($maxNbChars = 190),
        'Town' => $faker->word,
        'Street' => $faker->word,
        'House' => $faker->randomNumber($nbDigits = 3),
        'AreaNumber' => $faker->randomNumber($nbDigits = 3)
    ];
});

$factory->define(App\Balance::class, function (Faker\Generator $faker) {
    return [
        /*'UniqueLandNumber' => factory(App\Land::class)->create()->UniqueLandNumber,
        'PersonalNumber' => factory(App\Entity::class)->create()->PersonalNumber,*/
        'Year' => $faker->year
    ];
});
$factory->define(App\Contract::class, function (Faker\Generator $faker) {
    return [
        /*'UniqueLandNumber' => factory(App\Land::class)->create()->UniqueLandNumber,
        'PersonalNumber' => factory(App\Entity::class)->create()->PersonalNumber,*/
        'RentStartsFrom' => $faker->date($format =  'Y-m-d'),
        'RentEndsIn' => $faker->date($format =  'Y-m-d'),
        'NewPriceStartingDate' => $faker->date($format =  'Y-m-d'),
        'NewPriceTillDate' => $faker->date($format =  'Y-m-d'),
        'BankAccount' => $faker->bankAccountNumber,
        'ContractedBy' => $faker->text($maxNbChars = 40),
        'Subrenter' => $faker->word,
        'Type' => $faker->word,
        'fstPricePerHectare' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max=700),
        'sndPricePerHectare' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max=700),
        'ContractSignDate' => $faker->date($format =  'Y-m-d'),
        'ChangesDate' => $faker->date($format =  'Y-m-d'),
        'ContractChanges' => $faker->word,
        'Interval' => $faker->randomNumber($nbDigits = NULL),
        'ContractNumber' => $faker->randomNumber($nbDigits = NULL)

    ];
});
$factory->define(App\Details::class, function (Faker\Generator $faker) {
    return [
        /*'UniqueLandNumber' => factory(App\Land::class)->create()->UniqueLandNumber,
        'PersonalNumber' => factory(App\Entity::class)->create()->PersonalNumber,*/
        'RentedArea' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max=100),
        'ReferencedCompany' => $faker->text($maxNbChars = 40),
        'Subrenter' => $faker->word,
        'SubrentTillDate' => $faker->date($format =  'Y-m-d'),
        'SubrentedArea' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max=100),
        'SubrentRC' => $faker->word,
        'SubrentRCSince' => $faker->date($format =  'Y-m-d'),
        'OwnedDate' => $faker->date($format =  'Y-m-d')
    ];
});