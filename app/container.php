<?php

//Injección de controladores

$container['consulta'] = function ($c) {
    return new ConsultaController($c->db);
};