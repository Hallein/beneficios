<?php

//Injección de controladores

$container['clientes'] = function ($c) {
    //return new ClientesController($c->get('db'));
    return new ClientesController($c->db);
};

$container['proveedores'] = function ($c) {
    //return new ProveedoresController($c->get('db'));
    return new ProveedoresController('hola');
};

$container['insumos'] = function ($c) {
    //return new InsumosController($c->get('db'));
    return new InsumosController('hola');
};

$container['vehiculos'] = function ($c) {
    //return new VehiculosController($c->get('db'));
    return new VehiculosController('hola');
};

$container['factura_venta'] = function ($c) {
    //return new FacturasController($c->get('db'));
    return new FacturaVentaController('hola');
};

$container['factura_compra'] = function ($c) {
    //return new FacturasController($c->get('db'));
    return new FacturaCompraController('hola');
};

$container['servicios'] = function ($c) {
    //return new ServiciosController($c->get('db'));
    return new ServiciosController('hola');
};

$container['trabajadores'] = function ($c) {
    //return new TrabajadoresController($c->get('db'));
    return new TrabajadoresController('hola');
};

$container['contratos'] = function ($c) {
    //return new ContratosController($c->get('db'));
    return new ContratosController('hola');
};
