<?php

//Injección de controladores

$container['clientes'] = function ($c) {
    return new ClientesController($c->db);
};

$container['proveedores'] = function ($c) {
    return new ProveedoresController($c->db);
};

$container['bodegas'] = function ($c) {
    return new BodegasController($c->db);
};

$container['insumos'] = function ($c) {
    return new InsumosController($c->db);
};

$container['vehiculos'] = function ($c) {
    return new VehiculosController($c->db);
};

$container['documento_venta'] = function ($c) {
    return new DocumentoVentaController($c->db);
};

$container['documento_compra'] = function ($c) {
    return new DocumentoCompraController($c->db);
};

$container['servicio_arriendo'] = function ($c) {
    return new ServicioArriendoController($c->db);
};

$container['servicio_venta'] = function ($c) {
    return new ServicioVentaController($c->db);
};

$container['trabajadores'] = function ($c) {
    return new TrabajadoresController($c->db);
};

$container['contratos'] = function ($c) {
    return new ContratosController($c->db);
};
