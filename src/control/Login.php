<?php
require_once("../model/admin-usuarioModel.php");
require_once("../model/admin-rolesUsuario.php");
require_once("../model/admin-sesionModel.php");
require_once("../model/adminModel.php");

$objUsuario = new UsuarioModel();
$objRolesUsuario = new RolesUsuario();
$objSesion = new SessionModel();
$objAdmin = new AdminModel();

$tipo = $_GET['tipo'];
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$ip_address = $_SERVER['REMOTE_ADDR'];

if ($tipo == "iniciar_sesion") {
    //print_r($_POST);
    $usuario = trim($_POST['username']);
    $password = trim($_POST['password']);
    $arrResponse = array('status' => false, 'msg' => '');

    $arrusuario = $objUsuario->buscarUsuarioByUserName($usuario); 
   
    //print_r($arrUsuario);
    if (empty($arrusuario)) {
        $arrResponse = array('status' => false, 'msg' => 'Error, Credenciales incorrectas');
    } else {
        $arrObjRol = $objRolesUsuario->getRolByID($arrusuario->rol_id);
        if (password_verify($password, $arrusuario->password_hash)) {  
           //obtenemos nombres de los roles de un usuario (PARA SISTEMA QUE MANEJA USUARIO CON VARIOS ROLES)
        /*  $rolesDelUsuario = array();
            foreach ($arrObjRol as $rol) {
                array_push($rolesDelUsuario, $rol->nombre);
            }
            //concatenamos en un solo valor string
            $stringRoles = implode(",", $rolesDelUsuario); */

            $arr_contenido = [];
            // datos de sesion
            $fecha_hora_inicio = date("Y-m-d H:i:s");
            $fecha_hora_fin = strtotime('+2 minute', strtotime($fecha_hora_inicio));
            $fecha_hora_fin = date("Y-m-d H:i:s", $fecha_hora_fin);

            $llave = $objAdmin->generar_llave(30);
            $token = password_hash($llave, PASSWORD_DEFAULT);
            $id_usuario = $arrusuario->id;

            $arrSesion = $objSesion->registrarSesion($id_usuario, $llave, $fecha_hora_inicio, $fecha_hora_fin, $ip_address, $userAgent);
            //buscamos ultimo periodo
            /* $arrIes = $objInstitucion->buscarPrimerIe(); */
            $arrResponse = array('status' => true, 'msg' => 'Ingresar al sistema');

            $arr_contenido['sesion_id'] = $arrSesion;
            $arr_contenido['sesion_usuario'] = $id_usuario;
            $arr_contenido['sesion_usuario_nom'] = $arrusuario->nombre;
            $arr_contenido['sesion_usuario_rol'] = $arrObjRol->nombre;
            $arr_contenido['sesion_token'] = $token;
            $arrResponse['contenido'] = $arr_contenido;
        } else {
            $arrResponse = array('status' => false, 'msg' => 'Error, Credenciales incorrectas');
        }   

    }
    echo json_encode($arrResponse);
}

die;
?>