<?php
require_once '../library/conexion.php';

class tokenModel{
    private $conexion;
    function __construct(){
      $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
 }
 public function listarTokens(){
    $resultado = array();
    $sql = $this->conexion->query("SELECT * FROM tokens_api");
    while ($objeto = $sql->fetch_object()) {
        array_push($resultado, $objeto);
    }
    return $resultado;
 }

 public function registrarToken($token, $descripcion){
    $sql = $this->conexion->query("INSERT INTO tokens_api(token,descripcion) VALUES ('$token','$descripcion')");
      if ($sql) {
            $sql = $this->conexion->insert_id;
        } else {
            $sql = 0;
        }
        return $sql;
 }

    public function verificarDuplidadToken($token) {
        $stmt = $this->conexion->prepare("SELECT id FROM tokens_api WHERE token = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    public function obtenerDatosToken($idToken){
        $stmt = $this->conexion->prepare("SELECT * FROM tokens_api WHERE id = ?");
        $stmt->bind_param("i", $idToken);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_object();
        } else {
            return null;
        }
    }

    public function actualizarToken($idToken, $token, $descripcion){
        $stmt = $this->conexion->prepare("UPDATE tokens_api SET token = ?, descripcion = ? WHERE id = ?");
        $stmt->bind_param("ssi", $token, $descripcion, $idToken);
        return $stmt->execute();
    }

}