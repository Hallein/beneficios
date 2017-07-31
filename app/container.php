<?php

//Injección de controladores

$container['consulta'] = function ($c) {
    return new ConsultaController($c->db);
};

$container['beneficio'] = function ($c) {
    return new BeneficioController($c->db);
};

$container['hito_beneficio'] = function ($c) {
    return new HitoBeneficioController($c->db);
};

$container['etapa_beneficio'] = function ($c) {
    return new EtapaBeneficioController($c->db);
};
