
<?php
//error_reporting( ~E_NOTICE );
include("model/cn.php");
// COMBAK: -------------------------------------------------------------> Funcion agregar
//----------------------Variabels Globales

	 	// $response=array();
	if(isset($_POST['btnsave'])){
		$username = $_POST['producto_name'];
		$descrip=$_POST['producto_descrip'];
		$imgFile = $_FILES['producto_image']['name'];
		$tmp_dir = $_FILES['producto_image']['tmp_name'];
		$imgSize = $_FILES['producto_image']['size'];

		if(empty($imgFile)){//si esta vacia
			$errMSG = "Seleccione el archivo de imagen.";
		}
		else{
			$upload_dir = 'imagenes/'; // directory
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // obtiene el tipo de extencsion
			$valid_extensions = array('jpeg','jpg','png','gif','jfif','webp'); // valid extensions
			$userpic = rand(1,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions)){// allow valid image file formats
				move_uploaded_file($tmp_dir,$upload_dir.$userpic);
			}
// img-1
// $upload_dir_1 = 'imagenes/img_four/';
// $imgExt_1 = strtolower(pathinfo($img1_File,PATHINFO_EXTENSION));
// $va_exten_1= array('jpeg','jpg','png','gif','jfif','webp');
// $img_rut_1 = rand(1,1000000).".".$imgExt_1;
// if(in_array($imgExt_1,$va_exten_1)){
// 	move_uploaded_file($tmp1_dir,$upload_dir_1.$img_rut_1);
// }
}
		if(!isset($errMSG)){	//si no se produjo ningún error, continúe
			$stmt = $DB_con->prepare('INSERT INTO tbl_curso(db_curso,db_descripccion,db_imagen) VALUES(:c_curso, :c_descripccion , :c_imagen)');
			$stmt->bindParam(':c_curso',$username);
			$stmt->bindParam(':c_descripccion',$descrip);
			$stmt->bindParam('c_imagen',$userpic);//el bindParam no permine 2 tipos de valores de id

			if($stmt->execute()){	header('Location: user_admin.php');}
		}
	}

// COMBAK: -------------------------------------------------------------> Funcion delete
// Condicional para validar el borrado de la imagen

//session_start();
if(isset($_GET['delete_id'])){	// Selecciona imagen a borrar

$stmt_select = $DB_con->prepare('DELETE FROM tbl_curso WHERE db_id =:uid');
$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
	header("Location:user_admin.php");// Redireccioa al inicio
}


// COMBAK: -------------------------------------------------------------> Funcion update

session_start();
if (!isset($_SESSION['nombre'])) {
	header('Location: login.php');
}
elseif(isset($_SESSION['nombre'])){
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id'])){
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT db_nombre, db_precio, db_imagen, db_cancelado, db_cantidad, db_newPrecio, db_descripccion, db_peso , db_img1 FROM tbl_producto WHERE db_id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else{//la redireccion para que no se duplique al actualiar
		header("Location: user_admin.php");
	}
	if(isset($_POST['btn_save_updates'])){
		$username = $_POST['producto_name'];
		$userjob = $_POST['producto_pre'];
		$precio_new=$_POST['producto_newPre'];
		$cantidad=$_POST['producto_cant'];
		$descrip=$_POST['producto_descrip'];
		$peso_producto=$_POST['producto_peso'];

		$imgFile = $_FILES['producto_image']['name'];
		$tmp_dir = $_FILES['producto_image']['tmp_name'];

		$imgSize = $_FILES['producto_image']['size'];
		$img1_File= $_FILES['producto_foto1']['name'];
		$tmp1_dir = $_FILES['producto_foto1']['tmp_name'];
		$img1_Size = $_FILES['producto_foto1']['size'];

			// if($imgFile or $img1_File){
// 			if (!empty($imgFile)) {
// 				if ($imgFile) {
//
			// $upload_dir = 'imagenes/'; // upload directory 77 DIRECCION  de la ruta de carperta
			// $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			// $valid_extensions = array('jpeg','jpg','png','gif','jfif','webp'); // valid extensions
			// $userpic = rand(10,1000000).".".$imgExt;// esto es el codigo de eliminacion de ruta de img
			// if((in_array($imgExt, $valid_extensions)) or (in_array($imgExt_1,$va_exten_1)) ){
			//  // unlink($upload_dir.$edit_row['db_imagen']);//elimina
			// 	move_uploaded_file($tmp_dir,$upload_dir.$userpic);
			// }
// }
// else {
// 	$userpic = $edit_row['db_imagen'];
//
// }
//
// 		}
		// if ($imgFile) {
			// if ($username) {
	// 		if($imgFile or $img1_File){
	//
	// 	$upload_dir = 'imagenes/'; // upload directory 77 DIRECCION  de la ruta de carperta
	// 	$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
	// 	$valid_extensions = array('jpeg','jpg','png','gif','jfif','webp'); // valid extensions
	// 	$userpic = rand(10,1000000).".".$imgExt;// esto es el codigo de eliminacion de ruta de img
	// 	$upload_dir_1 = 'imagenes/img_four/';
	// 	$imgExt_1 = strtolower(pathinfo($img1_File,PATHINFO_EXTENSION));
	// 	$va_exten_1= array('jpeg','jpg','png','gif','jfif','webp');
	// 	$img_rut_1 = rand(10,1000000).".".$imgExt;
	// 	if((in_array($imgExt, $valid_extensions)) or (in_array($imgExt_1,$va_exten_1)) ){
	// 	 unlink($upload_dir.$edit_row['db_imagen']);//elimina
	// 		move_uploaded_file($tmp_dir,$upload_dir.$userpic);
	// 		unlink($upload_dir_1.$edit_row['db_img1']);//elimina
	// 		move_uploaded_file($tmp1_dir,$upload_dir_1.$img_rut_1);
	// 	}
	// }
		if($imgFile or $img1_File){
			$upload_dir = 'imagenes/'; // upload directory 77 DIRECCION  de la ruta de carperta
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg','jpg','png','gif','jfif','webp'); // valid extensions
			$userpic = rand(10,1000000).".".$imgExt;// esto es el codigo de eliminacion de ruta de img
				if(in_array($imgExt,$valid_extensions)){

			 unlink($upload_dir.$edit_row['db_imagen']);//elimina
				move_uploaded_file($tmp_dir,$upload_dir.$userpic);
			}
			$upload_dir_1 = 'imagenes/img_four/';
			$imgExt_1 = strtolower(pathinfo($img1_File,PATHINFO_EXTENSION));
			$va_exten_1= array('jpeg','jpg','png','gif','jfif','webp');
			$img_rut_1 = rand(10,1000000).".".$imgExt_1;
			if(in_array($imgExt_1,$va_exten_1)){
				unlink($upload_dir_1.$edit_row['db_img1']);//elimina
				move_uploaded_file($tmp1_dir,$upload_dir_1.$img_rut_1);
			}

		}
		// else if (!empty($img1_File)) {
		// 	// if (!empty($imgFile)) {
		// 	if ($img1_File) {
		//
		// 	// code...
		//
			// $upload_dir_1 = 'imagenes/img_four/';
			// $imgExt_1 = strtolower(pathinfo($img1_File,PATHINFO_EXTENSION));
			// $va_exten_1= array('jpeg','jpg','png','gif','jfif','webp');
			// $img_rut_1 = rand(10,1000000).".".$imgExt_1;
			// if(in_array($imgExt_1,$va_exten_1)){
			// 	// unlink($upload_dir_1.$edit_row['db_img1']);//elimina
			// 	move_uploaded_file($tmp1_dir,$upload_dir_1.$img_rut_1);
			// }
		// }
		// else {
		// 	$img_rut_1 = $edit_row['db_img1'];
		//
		// }
		//
		// }



		else{ //	si no se selecciona ninguna ima	gen, la imagen antigua permanece como está.
				$userpic = $edit_row['db_imagen'];
				$img_rut_1 = $edit_row['db_img1'];

		}
		if(!isset($errMSG)){///si no ocurre un error continue
			$stmt = $DB_con->prepare('UPDATE tbl_producto SET db_nombre=:uname,db_precio=:ujob,	db_imagen=:upic,db_cantidad=:p_cant, db_newPrecio=:p_newP,db_descripccion=:p_descrip,db_peso=:p_peso, db_img1=:p_img1
			WHERE db_id=:uid');
			$stmt->bindParam(':uid',$id);
			$stmt->bindParam(':uname',$username);
			$stmt->bindParam(':ujob',$userjob);
			$stmt->bindParam(':upic',$userpic);
			$stmt->bindParam(':p_cant',$cantidad);
			$stmt->bindParam(':p_newP',$precio_new);
			$stmt->bindParam(':p_descrip',$descrip);
			$stmt->bindParam(':p_peso',$peso_producto);
			$stmt->bindParam(':p_img1',$img_rut_1);
		if($stmt->execute()){	header('location:user_admin.php');}
 }
 } }
// ebf5aeb
//----------------------------------------------------------------------------  Login Proceso
if (isset($_POST['user_login_'])) {
	session_start();
	require('model/cn.php');
	$usuario = $_POST['txtUsu'];
	$contrasena = $_POST['txtPass'];
	$contador = 0;
	//preparo la consulta SQL//$resultado va hacer el $stmt
	$stmt=$DB_con->prepare("SELECT * FROM tbl_user WHERE db_correo = :nombre");
	//ejecucion de la consulta
	$stmt->execute(array(":nombre"=>$usuario));
	while($row_login=$stmt->fetch(PDO::FETCH_ASSOC)) {
	if(password_verify($contrasena, $row_login['db_password'])) {
		$_SESSION['nombre'] =$row_login['db_correo'];
	$contador++;
	}
		 }
		 if ($contador > 0) {
		echo "el usuario existe";
		 header('Location: user_admin.php');
		}
		else {
		 $_SESSION['message']='Contraseña invalida';
		}
}
//----------------------------------------------------------------------------  cerrar sesion
if (isset($_GET['exit'])) {
	session_start();
	session_destroy(); // session_unset();
	header('Location:login.php');
}
// --------------------------------------------------------------------------------- view-page producto

 ?>
