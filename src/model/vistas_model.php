<?php
class vistaModelo
{
/*     protected static function obtener_vista($vista)
    {
        $palabras_permitidas_n1 = ['charts','auth-signin'];

        if (in_array($vista, $palabras_permitidas_n1)) {

                if (is_file("./src/view/" . $vista . ".php")) {
                    $contenido = "./src/view/" . $vista . ".php";
                } else {
                    $contenido = "404";
                }
        } elseif ($vista == "inicio" || $vista == "index") {
            $contenido = "inicio.php";
        }else{
            $contenido = "404";
        }
        return $contenido;
    } */

    protected static function obtener_vista($vista)
    {
    // Validación básica de entrada
    if (!is_string($vista) || !preg_match('/^[a-z0-9\-_]+$/i', $vista)) {
        return '404';
    }

    // Mapa de rutas (fácil de mantener)
    $rutas = [
        'charts'      => __DIR__ . '/../view/charts.php',
        'auth-signin' => __DIR__ . '/../view/auth-signin.php',
        'inicio'      => __DIR__ . '/../view/inicio.php',
        'index'       => __DIR__ . '/../view/inicio.php',
        'eventos'       => __DIR__ . '/../view/eventos.php',
        'tokensApi'       => __DIR__ . '/../view/tokensApi.php',
        'forms-basic'       => __DIR__ . '/../view/forms-basic.php',
    ];

    if (!isset($rutas[$vista])) {
        return '404';
    }

    $ruta = $rutas[$vista];

    // Solo verificar existencia para vistas dinámicas (opcional si confías en tu mapa)
    if (!is_file($ruta)) {
        return '404';
    }

    return $ruta;
    }
}
?>