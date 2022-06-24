<?php

use Tuupola\Middleware\HttpBasicAuthentication;

function basicAuth(): HttpBasicAuthentication
{
    return new HttpBasicAuthentication([
        "users" => [
            "clienteConsulta" => "0cbnSE6E1wIQlQRceaGdhbCG1WB8YOg8eOM12oQCoFHu7xlLVZP3s98sLz9tvvM"
        ]
    ]);
}