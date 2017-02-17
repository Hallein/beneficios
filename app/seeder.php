<?php

$container['seeder'] = function($c){

    $seeder = new \tebazil\dbseeder\Seeder($c->db);
    $generator = $seeder->getGeneratorConfigurator();
    $faker = $generator->getFakerConfigurator();

    //Tabla Region
    $array =
     [
        [15, 'Arica y Parinacota'],
        [1, 'Tarapacá'],
        [2, 'Antofagasta'],
        [3, 'Atacama'],
        [4, 'Coquimbo'],
        [5, 'Valparaíso'],
        [6, 'Libertador B. O\'Higgins'],
        [7, 'Maule'],
        [8, 'BíoBío'],
        [9, 'La Araucanía'],
        [10, 'Los Lagos'],
        [11, 'Aisén del Gral. C. Ibáñez del Campo'],
        [12, 'Magallanes y de la Antártica Chilena'],
        [13, 'Metropolitana de Santiago'],
        [14, 'Los´Ríos']
     ];
    $columnConfig = ['ID_REGION','REGION'];

    $seeder->table('region')->data($array, $columnConfig)->rowQuantity(15);

    $seeder->table('comuna')->columns([
        'ID_COMUNA' => $generator->pk,
        'ID_REGION' => $generator->relation('region', 'ID_REGION'),
        'COMUNA'    => $faker->city
    ])->rowQuantity(40);

    //Tabla SEXO
    $array =
     [
        [1, 'Masculino'],
        [2, 'Femenino']
     ];
     $columnConfig = ['ID_SEXO','SEXO'];

     $seeder->table('sexo')->data($array, $columnConfig)->rowQuantity(2);


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
        'COMUNA'            => $generator->relation('comuna', 'ID_COMUNA'),
        'ID_SEXO'           => $generator->relation('sexo', 'ID_SEXO')
    ])->rowQuantity(40);

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
        'CARGO'             => $faker->jobTitle,
        'CONTRASENA'        => $faker->randomElement(['hola']),
        'ID_SEXO'           => $generator->relation('sexo', 'ID_SEXO')
    ])->rowQuantity(6);

    $seeder->table('bodega')->columns([        
        'ID_BODEGA'         => $generator->pk,
        'RUT_PERSONA'       => $generator->relation('trabajador', 'RUT_PERSONA'),
        'NOMBRE_BODEGA'     => $faker->company,
        'DIRECCION_BODEGA'  => $faker->address,
        'TIPO_BODEGA'       => $faker->randomElement([1, 2])
    ])->rowQuantity(4);

    $seeder->table('vehiculo')->columns([        
        'NRO_PATENTE'       => $faker->bothify('????##'),
        'ID_BODEGA'         => $generator->relation('bodega', 'ID_BODEGA'),
        'MARCA'             => $faker->colorName,
        'MODELO'            => $faker->colorName,
        'ANHO_FABRICACION'  => $faker->date($format = 'Y-m-d', $max = 'now'),
        'TIPO_VEHICULO'     => $faker->randomElement(['Automóvil','Camioneta 4x4','Furgón', 'Moto']),
        'ESTADO_VEHICULO'   => $faker->randomElement([1, 2, 3]), //'Disponible','En arriendo', 'Descompuesto'
        'TIPO_PATENTE'      => $faker->randomElement([1, 2, 3, 4])
    ])->rowQuantity(15);

    $seeder->table('insumo')->columns([        
        'ID_INSUMO'             => $generator->pk,
        'NOMBRE_INSUMO'         => $faker->randomElement(['Neumáticos 4x4', 'Ventana polarizada', 'Motor 2000cc', 'Pastillas freno', 'luces neón', 'Luces altas', 'Luces bajas', 'Funda asientos', 'Ventilador', 'Aceite', 'Agua oxigenada', 'Limpia parabrisas', 'Cables eléctricos']),
        'CATEGORIA_INSUMO'      => $faker->randomElement(['Repuestos autos', 'Repuestos camionetas', 'Repuestos motos', 'Misceláneos']),
        'SUBCATEGORIA_INSUMO'   => $faker->randomElement(['Luces', 'Chasis', 'Piezas', 'Neumáticos']),
        'PRECIO_VENTA'          => $faker->numberBetween($min = 5990, $max = 325000),
        'PRECIO_COMPRA'         => $faker->numberBetween($min = 2000, $max = 150000)
    ])->rowQuantity(20);

    $seeder->table('proveedor')->columns([        
        'RUT_PROVEEDOR'     => $faker->numberBetween($min = 1000000, $max = 25999999),
        'NOMBRE_PROVEEDOR'  => $faker->name,
        'COMUNA_PROVEEDOR'  => $generator->relation('comuna', 'ID_COMUNA')
    ])->rowQuantity(20);

    $seeder->table('documento_compra')->columns([        
        'ID_COMPRA'         => $generator->pk,
        'RUT_PROVEEDOR'     => $generator->relation('proveedor', 'RUT_PROVEEDOR'),
        'FECHA_COMPRA'      => $faker->date($format = 'Y-m-d', $max = 'now'),
        'HORA_COMPRA'       => $faker->time($format = 'H:i:s', $max = 'now'),
        'VALOR_COMPRA'      => $faker->numberBetween($min = 2000, $max = 150000),//Creo que este atributo no deberia ir, el valor de la compra va en el detalle, sumando todos los insumos
        'IVA'               => $faker->numberBetween($min = 200, $max = 15000),
        'FOLIO'             => $faker->numberBetween($min = 1, $max = 100),
        'NUMERO_SERIE'      => $faker->randomNumber($nbDigits = 4)
    ])->rowQuantity(15);

    $seeder->table('detalle_compra')->columns([        
        'ID_COMPRA'         => $generator->relation('documento_compra', 'ID_COMPRA'),
        'ID_INSUMO'         => $generator->relation('insumo', 'ID_INSUMO'),
        'CANTIDAD_COMPRADA' => $faker->numberBetween($min = 1, $max = 30),
        'SUB_TOTAL_COMPRA'  => $faker->numberBetween($min = 5000, $max = 800000)
    ])->rowQuantity(8);

    $seeder->table('detalle_bodega')->columns([        
        'ID_BODEGA'         => $generator->relation('bodega', 'ID_BODEGA'),
        'ID_INSUMO'         => $generator->relation('insumo', 'ID_INSUMO'),
        'STOCK'             => $faker->numberBetween($min = 1, $max = 30),
        'FECHA_INGRESO'     => $faker->date($format = 'Y-m-d', $max = 'now')
    ])->rowQuantity(3);

    $seeder->table('venta')->columns([        
        'ID_SERVICIO'       => $generator->pk,
        'TIPO_PAGO'         => $faker->randomElement([1, 2, 3]),
        'NOMBRE_SERVICIO'   => $faker->randomElement(['Reparación', 'Venta repuesto', 'Venta accesorio', 'Mecánico']),
        'TIPO_SERVICIO'     => $faker->randomElement([1, 2, 3, 4]),
        'ESTADO_SERVICIO'   => $faker->randomElement([1, 2, 3])
    ])->rowQuantity(30);

    $seeder->table('arriendo')->columns([        
        'ID_SERVICIO'       => $generator->pk,
        'FECHA_INICIO'      => $faker->date($format = 'Y-m-d', $max = 'now'),
        'FECHA_TERMINO'     => $faker->date($format = 'Y-m-d', $max = 'now'),
        'DETALLE'           => $faker->text($maxNbChars = 300),
        'NOMBRE_SERVICIO'   => $faker->randomElement(['Arriendo moto', 'Arriendo auto', 'Arriendo camioneta', 'Arriendo furgón']),
        'TIPO_SERVICIO'     => $faker->randomElement([1, 2, 3, 4]),
        'ESTADO_SERVICIO'   => $faker->randomElement([1, 2, 3])
    ])->rowQuantity(15);

    $seeder->table('documento_venta')->columns([        
        'ID_VENTA'          => $generator->pk,
        'RUT_PERSONA'       => $generator->relation('cliente', 'RUT_PERSONA'),
        'ID_SERVICIO'       => $generator->relation('venta', 'ID_SERVICIO'),
        'FECHA_VENTA'       => $faker->date($format = 'Y-m-d', $max = 'now'),
        'HORA_VENTA'        => $faker->time($format = 'H:i:s', $max = 'now'),
        'VALOR_VENTA'       => $faker->numberBetween($min = 4000, $max = 300000),//Creo que este atributo no deberia ir, el valor de la compra va en el detalle, sumando todos los insumos
        'IVA'               => $faker->numberBetween($min = 400, $max = 30000),
        'FOLIO'             => $faker->numberBetween($min = 1, $max = 100),
        'NUMERO_SERIE'      => $faker->randomNumber($nbDigits = 4)
    ])->rowQuantity(15);

    $seeder->table('detalle_venta')->columns([        
        'ID_VENTA'          => $generator->relation('documento_venta', 'ID_VENTA'),
        'ID_INSUMO'         => $generator->relation('insumo', 'ID_INSUMO'),
        'CANTIDAD_VENDIDA'  => $faker->numberBetween($min = 1, $max = 30),
        'SUB_TOTAL_VENTA'   => $faker->numberBetween($min = 5000, $max = 800000)
    ])->rowQuantity(8);

    $seeder->table('contrato')->columns([        
        'ID_CONTRATO'       => $generator->pk,
        'NRO_PATENTE'       => $generator->relation('vehiculo', 'NRO_PATENTE'),
        'RUT_PERSONA'       => $generator->relation('trabajador', 'RUT_PERSONA'),
        'CLI_RUT_PERSONA'   => $generator->relation('cliente', 'RUT_PERSONA'),
        'ID_SERVICIO'       => $generator->relation('arriendo', 'ID_SERVICIO'),
        'VALOR_ACORDADO'    => $faker->randomElement([100000, 200000, 300000, 400000, 50000, 40000, 30000, 80000, 90000]),
        'LUGAR_ENTREGA'     => $faker->streetAddress,
        'LUGAR_RETIRO'      => $faker->streetAddress,
        'FECHA_LIMITE'      => $faker->date($format = 'Y-m-d', $max = 'now'),
        'VALOR_TOTAL'       => $faker->randomElement([100000, 200000, 300000, 400000, 50000, 40000, 30000, 80000, 90000]),
        'DETALLE_CONTRATO'  => $faker->text($maxNbChars = 300),
        'ESTADO_CONTRATO'   => $faker->randomElement([1, 2, 3])
    ])->rowQuantity(8);

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
