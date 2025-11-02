<?php
session_start();
require_once('../model/admin-sesionModel.php');
require_once('../model/admin-tokensApi.php');
require_once('../model/adminModel.php');

$tipo = $_GET['tipo'];

$objToken = new TokenModel();
$objSesion = new SessionModel();
$objAdmin = new AdminModel();

$token = $_REQUEST['token'];
$id_sesion = $_REQUEST['sesion'];

if ($tipo == "listarTokens") {
    $arr_Respuesta = array('status' => false, 'mensaje' => 'Error_Sesion');
    if ($objSesion->verificar_sesion_si_activa($id_sesion, $token)) {
        $arrTokens = $objToken->listarTokens();
        if ($arrTokens) {
            $arr_Respuesta = array('status' => true, 'contenido' => $arrTokens);
        } else {
            $arr_Respuesta = array('status' => false, 'mensaje' => 'error sistema');
        }
    }
    echo json_encode($arr_Respuesta);
}


if ($tipo == "registrarToken") {
    $arr_Respuesta = array('status' => false, 'mensaje' => 'Error_Sesion');
    if ($objSesion->verificar_sesion_si_activa($id_sesion, $token)) {
        $tokenApi = trim($_POST['tokenApi']);
        $descripcion = $_POST['descripcion'];
        $tokennn = explode('-', $tokenApi);
        $verificarDuplicidad = $objToken->verificarDuplidadToken($tokenApi);
        if ($verificarDuplicidad == true) {
            $arr_Respuesta = array('status' => false, 'mensaje' => 'token ya existe');
        } else {
            if ($tokenApi == '' || count($tokennn) !== 3 || !is_numeric($tokennn[2])) {
                $arr_Respuesta = array('status' => false, 'mensaje' => 'token no apto');
            } else {
                $newIdtoken = $objToken->registrarToken($tokenApi, $descripcion);
                if ($newIdtoken > 0) {
                    $arr_Respuesta = array('status' => true, 'mensaje' => 'Token registrado');
                } else {
                    $arr_Respuesta = array('status' => false, 'mensaje' => 'error de sistema');
                }
            }
        }
    }
    echo json_encode($arr_Respuesta);
}

if ($tipo == "obtenerDatosToken") {
    $arr_Respuesta = array('status' => false, 'mensaje' => 'Error_Sesion');
    if ($objSesion->verificar_sesion_si_activa($id_sesion, $token)) {
        $idToken = $_POST['idToken'];
        $datosToken = $objToken->obtenerDatosToken($idToken);
        if ($datosToken) {
            $arr_Respuesta = array('status' => true, 'contenido' => $datosToken);
        } else {
            $arr_Respuesta = array('status' => false, 'mensaje' => 'error de sistema');
        }
    }
    echo json_encode($arr_Respuesta);
}
if ($tipo == "actualizarToken") {
    $arr_Respuesta = array('status' => false, 'mensaje' => 'Error_Sesion');
    if ($objSesion->verificar_sesion_si_activa($id_sesion, $token)) {
        $idToken = $_POST['idToken_new'];
        $tokenApi = trim($_POST['tokenApi_new']);
        $descripcion = $_POST['descripcion_new'];
        $tokennn = explode('-', $tokenApi);
        if ($tokenApi == '' || count($tokennn) !== 3 || !is_numeric($tokennn[2])) {
            $arr_Respuesta = array('status' => false, 'mensaje' => 'token invalido');
        } else {
            $sql = $objToken->actualizarToken($idToken, $tokenApi, $descripcion);
            if ($sql) {
                $arr_Respuesta = array('status' => true, 'mensaje' => 'Token actualizado');
            } else {
                $arr_Respuesta = array('status' => false, 'mensaje' => 'error de sistema');
            }
        }
    }
    echo json_encode($arr_Respuesta);
}
