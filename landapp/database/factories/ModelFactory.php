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
        'UniqueLandNumber' => $faker->unique()->numberBetween(100000000000, 999999999999),
        'CompanyName' => factory(App\Company::class)->create()->CompanyName,
        'Status' => $faker->word,
        'LandArea' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0),
        'SoilProductivityScore' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0),
        'RegisteredInRC' => $faker->date($format =  'Y-m-d'),
        'RegisterNumber' => $faker->word,
        'GivenInChange' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0),
        'PlotUnderRealState' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0),
        'LocationLand' => $faker->word
    ];
});
$factory->define(App\Entity::class, function (Faker\Generator $faker) {
    return [
        'PersonalNumber' => $faker->unique()->numberBetween(10000000000, 99999999999),
        'Name' => $faker->word,
        'Surname' => $faker->word,
        'Phone' => $faker->numberBetween(600000000, 700000000),
        'OtherContactInformation' => $faker->text(),
        'Town' => $faker->word,
        'Street' => $faker->word,
        'House' => $faker->randomNumber($nbDigits = 3),
        'AreaNumber' => $faker->randomNumber($nbDigits = 3)
    ];
});

$factory->define(App\Balance::class, function (Faker\Generator $faker) {
    return [
        'UniqueLandNumber' => factory(App\Land::class)->create()->UniqueLandNumber,
        'PersonalNumber' => factory(App\Entity::class)->create()->PersonalNumber,
        'Year' => $faker->year
    ];
});
$factory->define(App\Contract::class, function (Faker\Generator $faker) {
    return [
        'UniqueLandNumber' => factory(App\Land::class)->create()->UniqueLandNumber,
        'PersonalNumber' => factory(App\Entity::class)->create()->PersonalNumber,
        'RentStarsFrom' => $faker->date($format =  'Y-m-d'),
        'RentEndsIn' => $faker->date($format =  'Y-m-d'),
        'NewPriceStartingDate' => $faker->date($format =  'Y-m-d'),
        'NewPriceTillDate' => $faker->date($format =  'Y-m-d'),
        'BankAccount' => $faker->bankAccountNumber,
        'ContractedBy' => $faker->words($nb = 3, $asText = false),
        'Subrenter' => $faker->word,
        'Type' => $faker->word,
        'fstPricePerHectare' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0),
        'sndPricePerHectare' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0),
        'ContractSignDate' => $faker->date($format =  'Y-m-d'),
        'ChangesDate' => $faker->date($format =  'Y-m-d'),
        'ContractChanges' => $faker->word,
        'Interval' => $faker->randomNumber($nbDigits = NULL),
        'ContractNumber' => $faker->randomNumber($nbDigits = NULL)

    ];
});
$factory->define(App\Details::class, function (Faker\Generator $faker) {
    return [
        'UniqueLandNumber' => factory(App\Land::class)->create()->UniqueLandNumber,
        'PersonalNumber' => factory(App\Entity::class)->create()->PersonalNumber,
        'RentedArea' => $faker->randomFloat($nbMaxDecimals = 5, $min = 0),
        'ReferencedCompany' => $faker->words($nb = 3, $asText = false),
        'Subrenter' => $faker->word,
        'SubrenterTillDate' => $faker->date($format =  'Y-m-d'),
        'SubrentedArea' => $faker->randomFloat($nbMaxDecimals = 5, $min = 0),
        'SubrentRC' => $faker->word,
        'SubrentRCSince' => $faker->date($format =  'Y-m-d'),
        'OwnedDate' => $faker->date($format =  'Y-m-d')
    ];
});