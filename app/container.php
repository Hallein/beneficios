<?php

//Injección de controladores

$container['consulta'] = function ($c) {
    return new ConsultaController($c->db);
};

$container['beneficio'] = function ($c) {
    return new BeneficioController($c->db);
};
