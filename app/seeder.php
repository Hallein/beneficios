<?php

$container['seeder'] = function($c){

    $seeder = new \tebazil\dbseeder\Seeder($c->db);
    $generator = $seeder->getGeneratorConfigurator();
    $faker = $generator->getFakerConfigurator();

    $seeder->table('cliente')->columns([
        'RUT_PERSONA'       => $faker->numberBetween($min = 1000000, $max = 25999999),
        'NOMBRE_PERSONA'    => $faker->firstName,
        'APATERNO_PERSONA'  => $faker->lastName,
        'AMATERNO_PERSONA'  => $faker->lastName,
        'FECHA_NACIMIENO'   => $faker->date($format = 'Y-m-d', $max = 'now'),//DICE NACIMIENO EN BD
        'DIRECCION_PERSONA' => $faker->address,
        'TELEFONO_PERSONA'  => $faker->tollFreePhoneNumber,
        'EMAIL_PERSONA'     => $faker->email,
        'EMPRESA'           => $faker->company,
        'CIUDAD'            => $faker->state,
        'COMUNA'            => $faker->city
    ])->rowQuantity(30);

    $seeder->table('proveedor')->columns([        
        'RUT_PROVEEDOR'     => $faker->numberBetween($min = 1000000, $max = 25999999),
        'NOMBRE_PROVEEDOR'  => $faker->name,
        'CIUDAD_PROVEEDOR'  => $faker->city,
        'PAIS_PROVEEDOR'    => $faker->country
    ])->rowQuantity(30);

    
    return $seeder;
};

$app->get('/seeder', function ($request, $response, $args) {

	$semillas = $this->seeder->refill();
	return $semillas;
});