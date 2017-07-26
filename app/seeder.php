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

    $seeder->table('tipo_beneficio')->data($array, $columnConfig)->rowQuantity(3);

    // $seeder->table('comuna')->columns([
    //     'ID_COMUNA' => $generator->pk,
    //     'ID_REGION' => $generator->relation('region', 'ID_REGION'),
    //     'COMUNA'    => $faker->city
    // ])->rowQuantity(40);

    //Tabla Persona
    $array =
     [
        [17416925, 'Fernando Díaz Núñez'],
        [17095407, 'Julio Caruncho Arriagada'],
        [17097084, 'César Mamani Rozas'],
        [17115341, 'John Guerra Romero']
     ];
     $columnConfig = ['PER_RUT','PER_NOMBRE'];

     $seeder->table('persona')->data($array, $columnConfig)->rowQuantity(4);

     //Tabla Usuario
    $array =
     [
        [17416925, 'Fernando Díaz Núñez', '$2y$10$BKgJO37fRtueap0y6xJaU.4oPTjk4YYm0Zik7TakRNzo.KFdwOEYK'],
        [17095407, 'Julio Caruncho Arriagada', '$2y$10$BKgJO37fRtueap0y6xJaU.4oPTjk4YYm0Zik7TakRNzo.KFdwOEYK']
     ];
     $columnConfig = ['USU_RUT','USU_NOMBRE','USU_CLAVE'];

     $seeder->table('persona')->data($array, $columnConfig)->rowQuantity(2);

     //Tipo bodega
    $array =
     [
        [1, 'Bodega almacenamiento'],
        [2, 'Bodega estacionamiento']
     ];
    $columnConfig = ['ID_TIPO_BODEGA', 'DESCRIPCION_TIPO_BODEGA'];
    $seeder->table('tipo_bodega')->data($array, $columnConfig)->rowQuantity(2);

     //Bodega
    $array =
     [
        [1, 11111111, 'Bodega playa brava', 'Playa brava #1234', 1],
        [2, 22222222, 'Bodega zofri', 'Zofri galpón 777', 2]
     ];
    $columnConfig = ['ID_BODEGA','RUT_PERSONA','NOMBRE_BODEGA','DIRECCION_BODEGA','ID_TIPO_BODEGA'];
    $seeder->table('bodega')->data($array, $columnConfig)->rowQuantity(2);


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