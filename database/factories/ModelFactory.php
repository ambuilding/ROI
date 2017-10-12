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

$factory->define(App\Symbol::class, function (Faker\Generator $faker) {
	$symbol = $faker->numberBetween($min = 100000, $max = 900000);
	$name = str_limit($faker->creditCardNumber, 8, '');

    return [
    	'symbol' => (string)$symbol,
    	'name' => $name,
    ];
});

$factory->define(App\Transaction::class, function (Faker\Generator $faker) {
	$sum = DB::table('transactions')->where('symbol_id', 1)->sum('amount') + 106;
    $total = DB::table('transactions')->where('symbol_id', 1)->sum('shares') + 100;
    $cost = $sum / $total;
	//$faker->randomFloat($nbMaxDecimals = 4, $min = 10000, $max = 10000000000);

	return [
        'user_id' => function () {
            return factory('App\User')->create()->id;
        },
        'symbol_id' => function () {
            return factory(App\Symbol::class)->create()->id;
        },
        'dateTime' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
        'transaction'  => $faker->randomElement(['BUY' ,'SELL', 'HLI', 'HGU']),
        'shares' => 100,
        'amount' => 106,
        'price' => 106 / 100,
        'total' => $total,
        'sum' => $sum,
        'cost' => $cost,
    ];
});
