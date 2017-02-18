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
        'ID_COMUNA'            => $generator->relation('comuna', 'ID_COMUNA'),
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

    //Insumos
    $array =
     [
        [1,'Neumáticos 4x4','Repuestos autos','Neumáticos',325000,210000],
        [2,'Ventana polarizada','Misceláneos','Neumáticos',180000,70000],
        [3,'Motor 2000cc','Repuestos camionetas','Neumáticos',450000,290000],
        [4,'Pastillas freno','Repuestos autos','Neumáticos',48000,22000],
        [5,'luces neón','Misceláneos','Neumáticos',23500,10800],
        [6,'Luces altas','Misceláneos','Neumáticos',67000,30000],
        [7,'Luces bajas','Misceláneos','Neumáticos',60000,25000],
        [8,'Funda asientos','Repuestos autos','Neumáticos',18000,7500],
        [9,'Ventilador','Misceláneos','Neumáticos',9900,3800],
        [10,'Aceite','Repuestos motos','Neumáticos',15000,8000],
        [11,'Agua oxigenada','Repuestos motos','Neumáticos',7000,3000],
        [12,'Limpia parabrisas','Repuestos autos','Neumáticos',10000,5000],
        [13,'Cables eléctricos','Repuestos camionetas','Neumáticos',7900,3900],
        [14,'Cerraduras','Misceláneos','Neumáticos',14500,8000],
        [15,'Espejo retrovisor','Repuestos autos','Neumáticos',33500,18000],
     ];
    $columnConfig = ['ID_INSUMO','NOMBRE_INSUMO','CATEGORIA_INSUMO','SUBCATEGORIA_INSUMO','PRECIO_VENTA','PRECIO_COMPRA'];
    $seeder->table('insumo')->data($array, $columnConfig)->rowQuantity(15);

    /*$seeder->table('insumo')->columns([        
        'ID_INSUMO'             => $generator->pk,
        'NOMBRE_INSUMO'         => $faker->randomElement(['Neumáticos 4x4', 'Ventana polarizada', 'Motor 2000cc', 'Pastillas freno', 'luces neón', 'Luces altas', 'Luces bajas', 'Funda asientos', 'Ventilador', 'Aceite', 'Agua oxigenada', 'Limpia parabrisas', 'Cables eléctricos']),
        'CATEGORIA_INSUMO'      => $faker->randomElement(['Repuestos autos', 'Repuestos camionetas', 'Repuestos motos', 'Misceláneos']),
        'SUBCATEGORIA_INSUMO'   => $faker->randomElement(['Luces', 'Chasis', 'Piezas', 'Neumáticos']),
        'PRECIO_VENTA'          => $faker->numberBetween($min = 5990, $max = 325000),
        'PRECIO_COMPRA'         => $faker->numberBetween($min = 2000, $max = 150000)
    ])->rowQuantity(20);*/

    //Proveedor
    $array =
     [
        [10032679,'Fernando Díaz',1],
        [11815235,'Julio Caruncho',2],
        [13929670,'Camilo Daza',3],
        [14232276,'Brayan Berna',4],
        [15418583,'Oscar Chacón',5],
        [15733636,'Rodolfo Ruiz',6],
        [16541818,'Juan Rejas',7],
        [17585948,'John Guerra',8],
        [17688152,'Cesar Mamani',9],
        [17753028,'Rodrigo Marín',10],
        [18133193,'Sergio Cerda',11],
        [19281202,'David Cautín',12]
     ];
    $columnConfig = ['RUT_PROVEEDOR','NOMBRE_PROVEEDOR','ID_COMUNA'];
    $seeder->table('proveedor')->data($array, $columnConfig)->rowQuantity(12);

    //Documento de compra
    $array =
     [
        [1, 10032679,'2016/01/01','12:00:00',0,0,100,1],
        [2, 11815235,'2016/02/02','12:00:00',0,0,100,2],
        [3, 13929670,'2016/03/03','12:00:00',0,0,100,3],
        [4, 14232276,'2016/04/04','12:00:00',0,0,100,4],
        [5, 15418583,'2016/05/05','12:00:00',0,0,100,5],
        [6, 15733636,'2016/06/06','12:00:00',0,0,100,6],
        [7, 16541818,'2016/07/07','12:00:00',0,0,100,7],
        [8, 17585948,'2016/08/08','12:00:00',0,0,100,8],
        [9, 17688152,'2016/09/09','12:00:00',0,0,100,9],
        [10, 17753028,'2016/10/10','12:00:00',0,0,100,10],
        [11, 18133193,'2016/11/11','12:00:00',0,0,100,11],
        [12, 19281202,'2016/12/12','12:00:00',0,0,100,12]
     ];
    $columnConfig = ['ID_COMPRA','RUT_PROVEEDOR','FECHA_COMPRA','HORA_COMPRA','VALOR_COMPRA','IVA','FOLIO','NUMERO_SERIE'];
    $seeder->table('documento_compra')->data($array, $columnConfig)->rowQuantity(12);

    //Detalle de compra
    $array =
     [
        [1, 1, 3, 1], [1, 2, 2, 1], [1, 3, 1, 1], [1, 4, 1, 1],
        [2, 5, 5, 1], [2, 6, 10, 1], [2, 7, 2, 1], [2, 8, 1, 1], [2, 9, 3, 1],
        [3, 10, 2, 1], [3, 11, 4, 1], [3, 12, 2, 1],
        [4, 13, 3, 1], [4, 14, 5, 1], [4, 15, 1, 1], [4, 1, 11, 1], [4, 2, 4, 1], [4, 3, 1, 1],
        [5, 4, 4, 1], [5, 5, 2, 1], [5, 6, 3, 1],
        [6, 7, 5, 1], [6, 8, 9, 1], [6, 9, 2, 1], [6, 10, 1, 1], [6, 11, 1, 1], [6, 12, 7, 1], [6, 13, 3, 1], [6, 14, 2, 1], [6, 15, 1, 1],
        [7, 1, 10, 1],
        [8, 2, 4, 1], [8, 3, 3, 1],
        [9, 4, 13, 1], [9, 5, 9, 1], [8, 6, 8, 1], [8, 7, 2, 1],
        [10, 8, 1, 1], [10, 9, 5, 1], [10, 10, 1, 1], [10, 11, 10, 1], [10, 12, 2, 1], [10, 13, 4, 1],
        [11, 14, 2, 1], [11, 15, 10, 1], [11, 1, 9, 1],
        [12, 2, 4, 1], [12, 3, 16, 1], [12, 4, 6, 1], [12, 5, 7, 1]
     ];
    $columnConfig = ['ID_COMPRA','ID_INSUMO','CANTIDAD_COMPRADA',false];
    $seeder->table('detalle_compra')->data($array, $columnConfig)->rowQuantity(50);

    /*$seeder->table('detalle_compra')->columns([        
        'ID_COMPRA'         => $generator->relation('documento_compra', 'ID_COMPRA'),
        'ID_INSUMO'         => $generator->relation('insumo', 'ID_INSUMO'),
        'CANTIDAD_COMPRADA' => $faker->numberBetween($min = 1, $max = 30),
        'SUB_TOTAL_COMPRA'  => $faker->numberBetween($min = 5000, $max = 800000)
    ])->rowQuantity(8);*/

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
