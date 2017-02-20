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

     //Cliente
    $array =
     [
        [11111111,'Fernando','Díaz','Núñez','1990/01/01','Playa Brava #1234','99999999','hola@bien.cl','UNAP',1,1],
        [22222222,'Julio','Caruncho','Arriagada','1990/01/01','Playa Brava #1234','99999999','hola@bien.cl','UNAP',2,1],
        [33333333,'Camilo','Daza','Lavín','1990/01/01','Playa Brava #1234','99999999','hola@bien.cl','UNAP',3,1],
        [44444444,'Brayan','Berna','Rojas','1990/01/01','Playa Brava #1234','99999999','hola@bien.cl','UNAP',4,2],
        [55555555,'Oscar','Chacón','Cautín','1990/01/01','Playa Brava #1234','99999999','hola@bien.cl','UNAP',5,2],
        [66666666,'Rodolfo','Ruiz','Hola','1990/01/01','Playa Brava #1234','99999999','hola@bien.cl','UNAP',6,1],
        [77777777,'Juan','Rejas','Rejitas','1990/01/01','Playa Brava #1234','99999999','hola@bien.cl','UNAP',7,1],
        [88888888,'John','Guerra','Fría','1990/01/01','Playa Brava #1234','99999999','hola@bien.cl','UNAP',8,1],
        [99999999,'Cesar','Mamani','Rozas','1990/01/01','Playa Brava #1234','99999999','hola@bien.cl','UNAP',9,2],
        [10101010,'Rodrigo','Marín','Gordín','1990/01/01','Playa Brava #1234','99999999','hola@bien.cl','UNAP',10,1],
        [12121212,'Sergio','Cerda','Chao','1990/01/01','Playa Brava #1234','99999999','hola@bien.cl','UNAP',11,2],
        [13131313,'David','Cautín','Epifani','1990/01/01','Playa Brava #1234','99999999','hola@bien.cl','UNAP',12,1]
     ];
    $columnConfig = ['RUT_PERSONA','NOMBRE_PERSONA','APATERNO_PERSONA','AMATERNO_PERSONA','FECHA_NACIMIENTO','DIRECCION_PERSONA','TELEFONO_PERSONA','EMAIL_PERSONA','EMPRESA','ID_COMUNA','ID_SEXO'];
    $seeder->table('cliente')->data($array, $columnConfig)->rowQuantity(12);

    //Prevision salud
    $array =
     [
        [1, 'Fonasa'],
        [2, 'Isapre'],
        [3, 'Sin previsión']
     ];
    $columnConfig = ['ID_PREVISION_SALUD', 'DESCRIPCION_PREVISION_SALUD'];
    $seeder->table('prevision_salud')->data($array, $columnConfig)->rowQuantity(3);

    //Prevision social
    $array =
     [
        [1, 'AFP'],
        [2, 'Caja Los Andes'],
        [3, 'Sin previsión']
     ];
    $columnConfig = ['ID_PREVISION_SOCIAL', 'DESCRIPCION_PREVISION_SOCIAL'];
    $seeder->table('prevision_social')->data($array, $columnConfig)->rowQuantity(3);

     //Trabajador
    $array =
     [
        [11111111,'Fernando','Díaz','Núñez','1990/01/01','Playa Brava #1234','99999999','piratemani@gmail.com',1,1,'JEFE','123',1],
        [22222222,'Julio','Caruncho','Arriagada','1990/01/01','Playa Brava #1234','99999999','julio.caruncho.a@gmail.com',2,2,'JEFE','123',2],
        [33333333,'Camilo','Daza','Lavín','1990/01/01','Playa Brava #1234','99999999','daza.camilos@gmail.com',3,3,'JEFE','123',2]
     ];
    $columnConfig = ['RUT_PERSONA','NOMBRE_PERSONA','APATERNO_PERSONA','AMATERNO_PERSONA','FECHA_NACIMIENTO','DIRECCION_PERSONA','TELEFONO_PERSONA','EMAIL_PERSONA','ID_PREVISION_SOCIAL','ID_PREVISION_SALUD','CARGO','CONTRASENA','ID_SEXO'];
    $seeder->table('trabajador')->data($array, $columnConfig)->rowQuantity(3);

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

    //Tipo vehiculo
    $array =
     [
        [1, 'Auto'],
        [2, 'Moto'],
        [3, 'Camioneta'],
        [4, 'Furgón'],
        [5, 'Todo terreno']
     ];
    $columnConfig = ['ID_TIPO_VEHICULO', 'DESCRIPCION_TIPO_VEHICULO'];
    $seeder->table('tipo_vehiculo')->data($array, $columnConfig)->rowQuantity(5);

    //Vehiculo
    $array =
     [
        ['ASDF11', 2, 'Suzuki', 'Vitara', '2016/01/01', 1, 1, 'Normal'],
        ['QWER22', 2, 'Honda', 'CB 190R', '2016/01/01', 2, 1, 'Normal'],
        ['AABB33', 2, 'Mercedes Benz', 'a200', '2016/01/01', 1, 1, 'Normal'],
        ['JJCC44', 2, 'Ferrari', 'Enzo', '2016/01/01', 1, 1, 'Normal'],
        ['RRHH55', 2, 'Mitsubichi' , 'Montero', '2016/01/01', 3, 1, 'Normal']
     ];
    $columnConfig = ['NRO_PATENTE','ID_BODEGA','MARCA','MODELO','ANHO_FABRICACION','ID_TIPO_VEHICULO', 'ESTADO_VEHICULO','TIPO_PATENTE'];
    $seeder->table('vehiculo')->data($array, $columnConfig)->rowQuantity(5);

    $array =
     [
        [1, '2016/01/01', '2016/01/20', 'Arriendo de vehículo para su uso en la ciudad', 'Arriendo de vehículos', 2, 1],
        [2, '2016/02/01', '2016/01/10', 'Arriendo de vehículo para su uso en la ciudad', 'Arriendo de vehículos', 2, 1],
        [3, '2016/03/01', '2016/01/08', 'Arriendo de vehículo para su uso en la ciudad', 'Arriendo de vehículos', 2, 1],
        [4, '2016/04/01', '2016/01/13', 'Arriendo de vehículo para su uso en la ciudad', 'Arriendo de vehículos', 2, 1],
        [5, '2016/05/01', '2016/01/14', 'Arriendo de vehículo para su uso en la ciudad', 'Arriendo de vehículos', 2, 1]
     ];
    $columnConfig = ['ID_SERVICIO','FECHA_INICIO','FECHA_TERMINO','DETALLE','NOMBRE_SERVICIO','TIPO_SERVICIO', 'ESTADO_SERVICIO'];
    $seeder->table('arriendo')->data($array, $columnConfig)->rowQuantity(5);

    $array =
     [
        [1, 'ASDF11', '11111111', '44444444', '1', 10000, 'Cavancha, frente al colegio inglés','Baquedano #1234','2016/01/31',10000,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam ea vero praesentium quia, obcaecati omnis exercitationem delectus tenetur animi veritatis accusamus tempora cumque totam voluptas molestiae, soluta aspernatur natus nobis.',1],
        [2, 'QWER22', '22222222', '55555555', '2', 20000, 'Cavancha, frente al colegio inglés','Baquedano #1234','2016/01/31',20000,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum suscipit voluptate assumenda explicabo consequuntur dolores quod tempore enim eius, placeat asperiores minima fugit velit commodi, et laborum rerum consectetur, quaerat.',1],
        [3, 'AABB33', '33333333', '66666666', '3', 30000, 'Cavancha, frente al colegio inglés','Baquedano #1234','2016/01/31',30000,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae tenetur nihil tempora, quisquam eveniet beatae omnis harum, dicta alias doloremque praesentium blanditiis tempore dolore sapiente hic consequuntur aliquid quos libero.',1],
        [4, 'JJCC44', '11111111', '77777777', '4', 40000, 'Cavancha, frente al colegio inglés','Baquedano #1234','2016/01/31',40000,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, cumque quod ullam maxime eveniet pariatur vel incidunt aut fugit officia a quas deleniti molestias perferendis eos non suscipit voluptatibus odit.',1],
        [5, 'RRHH55', '22222222', '88888888', '5', 50000, 'Cavancha, frente al colegio inglés','Baquedano #1234','2016/01/31',50000,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate officia architecto, repellat nulla ad totam quidem deserunt numquam sapiente deleniti quia voluptatibus illum magnam aperiam sequi dolorem enim quam quae.',1]
     ];
    $columnConfig = ['ID_CONTRATO','NRO_PATENTE','RUT_PERSONA','CLI_RUT_PERSONA','ID_SERVICIO','VALOR_ACORDADO', 'LUGAR_ENTREGA','LUGAR_RETIRO','FECHA_LIMITE','VALOR_TOTAL','DETALLE_CONTRATO','ESTADO_CONTRATO'];
    $seeder->table('contrato')->data($array, $columnConfig)->rowQuantity(5);


    return $seeder;
};




//=============================================================================================




$container['seeder2'] = function($c){

    $seeder = new \tebazil\dbseeder\Seeder($c->db);
    $generator = $seeder->getGeneratorConfigurator();
    $faker = $generator->getFakerConfigurator();

    //Categoria insumo
    $array =
     [
        [1, 'Repuestos autos'],
        [2, 'Repuestos camionetas'],
        [3, 'Repuestos motos'],
        [4, 'Misceláneos']
     ];
    $columnConfig = ['ID_CATEGORIA_INSUMO', 'DESCRIPCION_CATEGORIA_INSUMO'];
    $seeder->table('categoria_insumo')->data($array, $columnConfig)->rowQuantity(4);

    //Insumos
    $array =
     [
        [1,'Neumáticos 4x4',1,325000,210000],
        [2,'Ventana polarizada',4,180000,70000],
        [3,'Motor 2000cc',2,450000,290000],
        [4,'Pastillas freno',1,48000,22000],
        [5,'luces neón',4,23500,10800],
        [6,'Luces altas',4,67000,30000],
        [7,'Luces bajas',4,60000,25000],
        [8,'Funda asientos',1,18000,7500],
        [9,'Ventilador',4,9900,3800],
        [10,'Aceite',2,15000,8000],
        [11,'Agua oxigenada',3,7000,3000],
        [12,'Limpia parabrisas',1,10000,5000],
        [13,'Cables eléctricos',2,7900,3900],
        [14,'Cerraduras',4,14500,8000],
        [15,'Espejo retrovisor',1,33500,18000],
     ];
    $columnConfig = ['ID_INSUMO','NOMBRE_INSUMO','ID_CATEGORIA_INSUMO','PRECIO_VENTA','PRECIO_COMPRA'];
    $seeder->table('insumo')->data($array, $columnConfig)->rowQuantity(15);

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

    //Detalle bodega
    $array =
     [
        [1, 1, 20, '2016/01/01'],
        [1, 2, 18, '2016/01/01'],
        [1, 3, 9, '2016/01/01'],
        [1, 4, 5, '2016/01/01'],
        [1, 5, 3, '2016/01/01'],
        [1, 6, 12, '2016/01/01'],
        [1, 7, 54, '2016/01/01'],
        [1, 8, 6, '2016/01/01'],
        [1, 9, 6, '2016/01/01'],
        [1, 10, 42, '2016/01/01'],
        [1, 11, 13, '2016/01/01'],
        [1, 12, 41, '2016/01/01'],
        [1, 13, 21, '2016/01/01'],
        [1, 14, 13, '2016/01/01'],
        [1, 15, 11, '2016/01/01']
     ];
    $columnConfig = ['ID_BODEGA', 'ID_INSUMO','STOCK','FECHA_INGRESO'];
    $seeder->table('detalle_bodega')->data($array, $columnConfig)->rowQuantity(15);

    //Venta
    $array =
     [
        [1, 1, 'Venta de insumos y repuestos', 1, 1],
        [2, 2, 'Venta de insumos y repuestos', 1, 1],
        [3, 1, 'Venta de insumos y repuestos', 1, 1],
        [4, 2, 'Venta de insumos y repuestos', 1, 1],
        [5, 1, 'Venta de insumos y repuestos', 1, 1],
        [6, 2, 'Venta de insumos y repuestos', 1, 1],
        [7, 1, 'Venta de insumos y repuestos', 1, 1],
        [8, 2, 'Venta de insumos y repuestos', 1, 1],
        [9, 1, 'Venta de insumos y repuestos', 1, 1],
        [10, 2, 'Venta de insumos y repuestos', 1, 1],
        [11, 1, 'Venta de insumos y repuestos', 1, 1],
        [12, 2, 'Venta de insumos y repuestos', 1, 1],
        [13, 1, 'Venta de insumos y repuestos', 1, 1],
        [14, 2, 'Venta de insumos y repuestos', 1, 1],
        [15, 1, 'Venta de insumos y repuestos', 1, 1],
        [16, 2, 'Venta de insumos y repuestos', 1, 1],
        [17, 1, 'Venta de insumos y repuestos', 1, 1],
        [18, 2, 'Venta de insumos y repuestos', 1, 1],
        [19, 1, 'Venta de insumos y repuestos', 1, 1],
        [20, 2, 'Venta de insumos y repuestos', 1, 1],
        [21, 1, 'Venta de insumos y repuestos', 1, 1],
        [22, 2, 'Venta de insumos y repuestos', 1, 1],
        [23, 1, 'Venta de insumos y repuestos', 1, 1],
        [24, 2, 'Venta de insumos y repuestos', 1, 1]
     ];
    $columnConfig = ['ID_SERVICIO', 'TIPO_PAGO','NOMBRE_SERVICIO','TIPO_SERVICIO','ESTADO_SERVICIO'];
    $seeder->table('venta')->data($array, $columnConfig)->rowQuantity(24);

    //Documento de venta
    $array =
     [
        [1, 11111111,1,'2016/01/01','12:00:00',0,0,100,1],
        [2, 22222222,2,'2016/02/02','12:00:00',0,0,100,2],
        [3, 33333333,3,'2016/03/03','12:00:00',0,0,100,3],
        [4, 22222222,4,'2016/04/04','12:00:00',0,0,100,4],
        [5, 55555555,5,'2016/05/05','12:00:00',0,0,100,5],
        [6, 11111111,6,'2016/06/06','12:00:00',0,0,100,6],
        [7, 66666666,7,'2016/07/07','12:00:00',0,0,100,7],
        [8, 88888888,8,'2016/08/08','12:00:00',0,0,100,8],
        [9, 99999999,9,'2016/09/09','12:00:00',0,0,100,9],
        [10, 10101010,10,'2016/10/10','12:00:00',0,0,100,10],
        [11, 11111111,11,'2016/11/11','12:00:00',0,0,100,11],
        [12, 22222222,12,'2016/12/12','12:00:00',0,0,100,12],
        [13, 11111111,13,'2016/01/01','12:00:00',0,0,100,1],
        [14, 88888888,14,'2016/02/02','12:00:00',0,0,100,2],
        [15, 33333333,15,'2016/03/03','12:00:00',0,0,100,3],
        [16, 22222222,16,'2016/04/04','12:00:00',0,0,100,4],
        [17, 33333333,17,'2016/05/05','12:00:00',0,0,100,5],
        [18, 66666666,18,'2016/06/06','12:00:00',0,0,100,6],
        [19, 22222222,19,'2016/07/07','12:00:00',0,0,100,7],
        [20, 22222222,20,'2016/08/08','12:00:00',0,0,100,8],
        [21, 22222222,21,'2016/09/09','12:00:00',0,0,100,9],
        [22, 22222222,22,'2016/10/10','12:00:00',0,0,100,10],
        [23, 33333333,23,'2016/11/11','12:00:00',0,0,100,11],
        [24, 33333333,24,'2016/12/12','12:00:00',0,0,100,12]
     ];
    $columnConfig = ['ID_VENTA','RUT_PERSONA','ID_SERVICIO','FECHA_VENTA','HORA_VENTA','VALOR_VENTA','IVA','FOLIO','NUMERO_SERIE'];
    $seeder->table('documento_venta')->data($array, $columnConfig)->rowQuantity(24);

    //Detalle de venta
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
    $columnConfig = ['ID_VENTA','ID_INSUMO','CANTIDAD_VENDIDA',false];
    $seeder->table('detalle_venta')->data($array, $columnConfig)->rowQuantity(50);

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

$app->get('/seeder2', function ($request, $response, $args) {

    $query = $this->db->prepare('SET FOREIGN_KEY_CHECKS = 0');          
    $query->execute();

    $semillas = $this->seeder2->refill();

    $query = $this->db->prepare('SET FOREIGN_KEY_CHECKS = 1');          
    $query->execute();

    return $semillas;
});
