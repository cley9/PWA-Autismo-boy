
<?php
/* ---------------------------------Version de conexion de PDO antiguo
$password='';
$user='root';
$nameDba='producto';
try {
        $db=new PDO('mysql:host=localhost; dbname='.$nameDba,$user,$password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

} catch (Exception $e) {
  echo "Error de conexion ".$e->getMessage;
}*/



//      --------------------------------Version Moderna de conexion de PDO :

$Localhost = 'localhost';
$Usuario_BD = 'root';
$Password_BD = '';
$Nombre_BD = 'dba_aprendizaje';//php_imagenpdo
//$Nombre_BD = 'producto';//php_imagenpdo

try{
  $DB_con = new PDO("mysql:host={$Localhost};dbname={$Nombre_BD};charset=UTF8",$Usuario_BD,$Password_BD);
  $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //$DB_con->query("set names utf8;");
  $DB_con->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
  $DB_con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

}
catch(PDOException $e){
  echo $e->getMessage();
}


/* ------------------------------------------------------------------conexion senscilla de pdo
$servidor = 'localhost';
$BD = 'cifrado_php';
$usuario = 'root';
$password = '';

//establezco la conexion con PDO en este caso para MySQL u otro gestor
$DB = new PDO("mysql:host=$servidor; dbname=$BD", $usuario, $password);

//aplico el cotejamiento
$DB->exec("SET CHARACTER SET utf8");
*/


?>
