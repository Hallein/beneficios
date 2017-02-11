<?php

//Injección de controladores

$container['clientes'] = function ($c) {
    //return new ClientesController($c->get('db'));
    return new ClientesController($c->db);
};

$container['proveedores'] = function ($c) {
    //return new ProveedoresController($c->get('db'));
    return new ProveedoresController($c->db);
};

$container['bodegas'] = function ($c) {
    //return new ContratosController($c->get('db'));
    return new BodegasController($c->db);
};

$container['insumos'] = function ($c) {
    //return new InsumosController($c->get('db'));
    return new InsumosController($c->db);
};

$container['vehiculos'] = function ($c) {
    //return new VehiculosController($c->get('db'));
    return new VehiculosController($c->db);
};

$container['documento_venta'] = function ($c) {
    //return new FacturasController($c->get('db'));
    return new DocumentoVentaController('hola');
};

$container['documento_compra'] = function ($c) {
    //return new FacturasController($c->get('db'));
    return new DocumentoCompraController('hola');
};

$container['servicios'] = function ($c) {
    //return new ServiciosController($c->get('db'));
    return new ServiciosController('hola');
};

$container['trabajadores'] = function ($c) {
    //return new TrabajadoresController($c->get('db'));
    return new TrabajadoresController($c->db);
};

$container['contratos'] = function ($c) {
    //return new ContratosController($c->get('db'));
    return new ContratosController('hola');
};
