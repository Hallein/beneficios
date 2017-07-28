<?php

$container['seeder'] = function($c){

    $seeder = new \tebazil\dbseeder\Seeder($c->db);
    $generator = $seeder->getGeneratorConfigurator();
    $faker = $generator->getFakerConfigurator();

    //Tabla Tipo Beneficio
    $array =
     [
        [1, 'Ampliación'],
        [2, 'Arriendo'],
        [3, 'Remodelación']
     ];
    $columnConfig = ['TIPBEN_ID','TIPBEN_NOMBRE'];

    $seeder->table('TIPO_BENEFICIO')->data($array, $columnConfig)->rowQuantity(count($array));

    //Tabla Persona
    $array =
     [
        [17416925, 'Fernando Díaz Núñez'],
        [17095407, 'Julio Caruncho Arriagada'],
        [17097084, 'César Mamani Rozas'],
        [17115341, 'John Guerra Romero']
     ];
     $columnConfig = ['PER_RUT','PER_NOMBRE'];

     $seeder->table('PERSONA')->data($array, $columnConfig)->rowQuantity(count($array));

    //Tabla Usuario
    $array =
    [
        [17416925, 'Fernando Díaz Núñez', '$2y$10$BKgJO37fRtueap0y6xJaU.4oPTjk4YYm0Zik7TakRNzo.KFdwOEYK'],
        [17095407, 'Julio Caruncho Arriagada', '$2y$10$BKgJO37fRtueap0y6xJaU.4oPTjk4YYm0Zik7TakRNzo.KFdwOEYK']
    ];
    $columnConfig = ['US_RUT','US_NOMBRE','US_CLAVE'];

    $seeder->table('USUARIO')->data($array, $columnConfig)->rowQuantity(count($array));

    //Tabla Etapa
    $array =
    [
        [1, 'Primera Etapa', ''],
        [2, 'Segunta Etapa', ''],
        [3, 'Tercera Etapa', ''],
        [4, 'Cuarta Etapa', ''],
        [5, 'Quinta Etapa', ''],
        [6, 'Sexta Etapa', '']
        
    ];
    $columnConfig = ['ETA_ID','ETA_NOMBRE','ETA_DETALLE'];

    $seeder->table('ETAPA')->data($array, $columnConfig)->rowQuantity(count($array));

    //Tabla Hito
    $array =
    [
        [1, 1, 'Formulario Pendiente', 1], //Etapa Uno
        [2, 1, 'Formulario Recepcionado', 1],
        [3, 1, 'Formulario con Observaciones', 1],
        [4, 1, 'Formulario Aprobado', 1],
        [5, 1, 'Solicitud Rechazada', 1],
        [6, 2, 'Escritura Pública de Garantías - En Preparación', 1], //Etapa Dos
        [7, 2, 'Escritura Pública de Garantías - Enviada por Mail', 1],
        [8, 2, 'Solicitud de Préstamo - En Preparación', 1],
        [9, 2, 'Solicitud de Préstamo - Enviada por Mail', 1],
        [10, 2, 'Mandato en Preparación - En Preparación', 1],
        [11, 2, 'Mandato en Preparación - Enviada por Mail', 1],
        [12, 2, 'Pagaré en Preparación - En Preparación', 1],
        [13, 2, 'Pagaré en Preparación - Enviada por Mail', 1],
        [14, 3, 'Firma de Documentos - Pendientes', 1], //Etapa Tres
        [15, 3, 'Documentos Recepcionados con Observaciones', 1],
        [16, 3, 'Documentos Recepcionados', 1],
        [17, 3, 'Emisión de Gastos de Impuestos al Crédito', 1],
        [18, 4, 'Legalización de Documentos', 1], //Etapa Cuatro
        [19, 4, 'Emisión de Gastos Notariales', 1], 
        [20, 5, 'Pagaré Pendiente', 1], //Etapa Cinco
        [21, 5, 'Pagaré Recepcionado', 1], 
        [22, 6, 'Ingreso a módulo de Préstamos para Beneficio', 1], //Etapa Seis
        [23, 6, 'Beneficio Otorgado', 1]
        
    ];
    $columnConfig = ['HITO_ID', 'ETA_ID','HITO_NOMBRE','HITO_ESTADO']; //Estado: 1: Activo, 2: Inactivo

    $seeder->table('HITO')->data($array, $columnConfig)->rowQuantity(count($array));

    //Tabla Beneficio
    $array =
    [
        [1, 1, 17416925, 'Los Pelambres', 1],
        [2, 2, 17095407, 'Centinela', 1],
        [3, 3, 17097084, 'Antucoya', 2],
        [4, 1, 17115341, 'Zaldívar', 3],

    ];
    $columnConfig = ['BEN_ID','TIPBEN_ID','PER_RUT','BEN_EMPRESA','BEN_ESTADO']; //Estado: 1: En Proceso, 2: Rechazado, 3: Finalizado

    $seeder->table('BENEFICIO')->data($array, $columnConfig)->rowQuantity(count($array));

    //Tabla Etapa Beneficio
    $array =
    [
        [1, 1, '2017/01/01 14:15:00', '2017/01/31 16:30:00', 2], //Pretzel
        [2, 1, '2017/01/31 14:15:00', '2017/02/15 16:30:00', 2],
        [3, 1, '2017/02/15 14:15:00', '2017/02/28 16:30:00', 2],
        [4, 1, '2017/02/28 14:15:00', '2017/03/31 16:30:00', 2],
        [5, 1, '2017/03/31 14:15:00', '', 1],

        [1, 2, '2017/01/05 14:15:00', '2017/01/20 16:30:00', 2], //Seedpot
        [2, 2, '2017/01/20 14:15:00', '2017/02/10 16:30:00', 2],
        [3, 2, '2017/02/10 14:15:00', '', 1],

        [1, 3, '2017/01/10 14:15:00', '2017/01/15 16:30:00', 2], //DesarroYa
        [2, 3, '2017/01/15 14:15:00', '2017/02/15 16:30:00', 2],

        [1, 4, '2017/01/01 14:15:00', '2017/01/31 16:30:00', 2], //Panzón
        [2, 4, '2017/01/31 14:15:00', '2017/02/15 16:30:00', 2],
        [3, 4, '2017/02/15 14:15:00', '2017/02/28 16:30:00', 2],
        [4, 4, '2017/02/28 14:15:00', '2017/03/31 16:30:00', 2],
        [5, 4, '2017/03/31 14:15:00', '2017/04/12 16:30:00', 2],
        [6, 4, '2017/04/12 14:15:00', '2017/04/25 16:30:00', 2]

    ];
    $columnConfig = ['ETA_ID','BEN_ID','EB_FECHAINI','EB_FECHAFIN','EB_ESTADO']; //Estado: 1: Activo, 2: Terminado

    $seeder->table('ETAPA_BENEFICIO')->data($array, $columnConfig)->rowQuantity(count($array));

    //Tabla Hito Beneficio
    $array =
    [
        //Pretzel
        [1, 17416925, 1, '2017/01/05 14:15:00', ''],
        [2, 17416925, 1, '2017/01/20 14:15:00', ''],
        [3, 17416925, 1, '2017/02/10 14:15:00', ''],
        [4, 17416925, 1, '2017/01/10 14:15:00', ''],
        [5, 17416925, 1, '2017/01/15 14:15:00', ''],
        [6, 17416925, 1, '2017/01/01 14:15:00', ''],
        [7, 17416925, 1, '2017/01/31 14:15:00', ''],
        [8, 17416925, 1, '2017/02/15 14:15:00', ''],
        [9, 17416925, 1, '2017/02/28 14:15:00', ''],
        [10, 17416925, 1, '2017/03/31 14:15:00', ''],
        [11, 17416925, 1, '2017/01/05 14:15:00', ''],
        [12, 17416925, 1, '2017/01/20 14:15:00', ''],
        [13, 17416925, 1, '2017/02/10 14:15:00', ''],
        [14, 17416925, 1, '2017/01/10 14:15:00', ''],
        [15, 17416925, 1, '2017/01/15 14:15:00', ''],
        [16, 17416925, 1, '2017/01/15 14:15:00', ''],
        [17, 17416925, 1, '2017/01/15 14:15:00', ''],
        [18, 17416925, 1, '2017/01/15 14:15:00', ''],
        [19, 17416925, 1, '2017/01/15 14:15:00', ''],
        [20, 17416925, 1, '2017/01/15 14:15:00', ''],
        //SeedPot
        [1, 17416925, 2, '2017/04/12 14:15:00', ''],
        [2, 17416925, 2, '2017/04/25 14:15:00', ''],
        [3, 17416925, 2, '2017/04/25 14:15:00', ''],
        [4, 17416925, 2, '2017/04/25 14:15:00', ''],
        [5, 17416925, 2, '2017/04/25 14:15:00', ''],

        [6, 17416925, 2, '2017/04/12 14:15:00', ''],
        [7, 17416925, 2, '2017/04/25 14:15:00', ''],
        [8, 17416925, 2, '2017/04/25 14:15:00', ''],
        [9, 17416925, 2, '2017/04/25 14:15:00', ''],
        [10, 17416925, 2, '2017/04/25 14:15:00', ''],
        [11, 17416925, 2, '2017/04/25 14:15:00', ''],
        [12, 17416925, 2, '2017/04/25 14:15:00', ''],
        [13, 17416925, 2, '2017/04/25 14:15:00', ''],

        [14, 17416925, 2, '2017/04/12 14:15:00', ''],
        //DesarroYa
        [1, 17416925, 3, '2017/04/25 14:15:00', ''],
        [2, 17416925, 3, '2017/04/25 14:15:00', ''],
        [3, 17416925, 3, '2017/04/25 14:15:00', ''],
        [4, 17416925, 3, '2017/04/25 14:15:00', ''],
        [5, 17416925, 3, '2017/04/25 14:15:00', ''],
        //Panzón
        [1, 17416925, 4, '2017/01/01 14:15:00', ''],
        [2, 17416925, 4, '2017/01/31 14:15:00', ''],
        [3, 17416925, 4, '2017/02/15 14:15:00', ''],
        [4, 17416925, 4, '2017/02/28 14:15:00', ''],
        [5, 17416925, 4, '2017/03/31 14:15:00', ''],
        [6, 17416925, 4, '2017/01/05 14:15:00', ''],
        [7, 17416925, 4, '2017/01/20 14:15:00', ''],
        [8, 17416925, 4, '2017/02/10 14:15:00', ''],
        [9, 17416925, 4, '2017/01/10 14:15:00', ''],
        [10, 17416925, 4, '2017/01/15 14:15:00', ''],
        [11, 17416925, 4, '2017/01/01 14:15:00', ''],
        [12, 17416925, 4, '2017/01/31 14:15:00', ''],
        [13, 17416925, 4, '2017/02/15 14:15:00', ''],
        [14, 17416925, 4, '2017/02/28 14:15:00', ''],
        [15, 17416925, 4, '2017/03/31 14:15:00', ''],
        [16, 17416925, 4, '2017/01/05 14:15:00', ''],
        [17, 17416925, 4, '2017/01/20 14:15:00', ''],
        [18, 17416925, 4, '2017/02/10 14:15:00', ''],
        [19, 17416925, 4, '2017/01/10 14:15:00', ''],
        [20, 17416925, 4, '2017/01/15 14:15:00', ''],
        [21, 17416925, 4, '2017/01/15 14:15:00', ''],
        [22, 17416925, 4, '2017/01/15 14:15:00', ''],
        [23, 17416925, 4, '2017/01/15 14:15:00', ''],

    ];
    $columnConfig = ['HITO_ID','US_RUT','BEN_ID','HB_FECHA','HB_DETALLE']; //Estado: 1: Activo, 2: Terminado

    $seeder->table('HITO_BENEFICIO')->data($array, $columnConfig)->rowQuantity(count($array));

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