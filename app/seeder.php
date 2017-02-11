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
        'FECHA_NACIMIENTO'  => $faker->date($format = 'Y-m-d', $max = 'now'),
        'DIRECCION_PERSONA' => $faker->address,
        'TELEFONO_PERSONA'  => $faker->tollFreePhoneNumber,
        'EMAIL_PERSONA'     => $faker->email,
        'EMPRESA'           => $faker->company,
        'CIUDAD'            => $faker->city
    ])->rowQuantity(80);

    $seeder->table('trabajador')->columns([
        'RUT_PERSONA'       => $faker->numberBetween($min = 1000000, $max = 25999999),
        'NOMBRE_PERSONA'    => $faker->firstName,
        'APATERNO_PERSONA'  => $faker->lastName,
        'AMATERNO_PERSONA'  => $faker->lastName,
        'FECHA_NACIMIENTO'  => $faker->date($format = 'Y-m-d', $max = 'now'),
        'DIRECCION_PERSONA' => $faker->address,
        'TELEFONO_PERSONA'  => $faker->tollFreePhoneNumber,
        'EMAIL_PERSONA'     => $faker->email,
        'PREVISION_SOCIAL'  => $faker->randomElement(['AFP','Sin previsión']),
        'PREVISION_SALUD'   => $faker->randomElement(['Fonasa','Isapre','Sin previsión']),
        'CARGO'             => $faker->jobTitle
    ])->rowQuantity(6);

    $seeder->table('proveedor')->columns([        
        'RUT_PROVEEDOR'     => $faker->numberBetween($min = 1000000, $max = 25999999),
        'NOMBRE_PROVEEDOR'  => $faker->name,
        'CIUDAD_PROVEEDOR'  => $faker->city,
        'PAIS_PROVEEDOR'    => $faker->country
    ])->rowQuantity(30);

    $seeder->table('bodega')->columns([        
        'ID_BODEGA'         => $generator->pk,
        'RUT_PERSONA'       => $generator->relation('trabajador', 'RUT_PERSONA'),
        'NOMBRE_BODEGA'     => $faker->company,
        'DIRECCION_BODEGA'  => $faker->address,
        'TIPO_BODEGA'       => $faker->randomElement([1, 2])
    ])->rowQuantity(3);

    $seeder->table('vehiculo')->columns([        
        'NRO_PATENTE'       => $faker->bothify('????##'),
        'ID_BODEGA'         => $generator->relation('bodega', 'ID_BODEGA'),
        'MARCA'             => $faker->colorName,
        'MODELO'            => $faker->colorName,
        'ANHO_FABRICACION'  => $faker->date($format = 'Y-m-d', $max = 'now'),
        'TIPO_VEHICULO'     => $faker->randomElement(['Automóvil','Camioneta 4x4','Furgón', 'Moto']),
        'ESTADO_VEHICULO'   => $faker->randomElement([1, 2, 3]), //'Disponible','En arriendo', 'Descompuesto'
        'TIPO_PATENTE'      => $faker->randomElement([1, 2, 3, 4])
    ])->rowQuantity(20);

    $seeder->table('insumo')->columns([        
        'ID_INSUMO'             => $generator->pk,
        'NOMBRE_INSUMO'         => $faker->randomElement(['Neumáticos 4x4', 'Ventana polarizada', 'Motor 2000cc', 'Pastillas freno', 'luces neón', 'Luces altas', 'Luces bajas', 'Funda asientos', 'Ventilador', 'Aceite', 'Agua oxigenada', 'Limpia parabrisas', 'Cables eléctricos']),
        'CATEGORIA_INSUMO'      => $faker->randomElement(['Repuestos autos', 'Repuestos camionetas', 'Repuestos motos', 'Misceláneos']),
        'SUBCATEGORIA_INSUMO'   => $faker->randomElement(['Luces', 'Chasis', 'Piezas', 'Neumáticos']),
        'PRECIO_VENTA'          => $faker->numberBetween($min = 5990, $max = 325000),
        'PRECIO_COMPRA'         => $faker->numberBetween($min = 2000, $max = 150000)
    ])->rowQuantity(20);

    return $seeder;
};


//Para correr el Seeder, ir a http://localhost/industrial/public/api/seeder

$app->get('/seeder', function ($request, $response, $args) {

    $query = $this->db->prepare('SET FOREIGN_KEY_CHECKS = 0');          
    $query->execute();

	$semillas = $this->seeder->refill();

    $query = $this->db->prepare('SET FOREIGN_KEY_CHECKS = 1');          
    $query->execute();

	return $semillas;
});