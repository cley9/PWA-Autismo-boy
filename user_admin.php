<?php
session_start();

if (!isset($_SESSION['nombre'])) {
  header('Location: login.php');
}
elseif(isset($_SESSION['nombre'])){
  include 'model/cn.php';
require_once('includes/header.php');

}else{echo "Error en el sistema";}


if (isset($_SESSION['nombre'])) {?>

  <script type="text/javascript">
  var factory=  "<?php echo $_SESSION['nombre'] ; ?>";
     Swal.fire({
       icon: 'success',
       title:  ' Bienvenido '+factory+"  ",

       text: 'Ahora puedes gestionar los datos !',
       showConfirmButton: false,
       timer: 3000

     })
  </script>

<?php  } ?>

<!-- --------------------------------------------------------------------------------------------------° -->
  <div class="container pt-4">
    <div class="row">
      <h2></h2>



      <!-- <h1 class="text-center ">Bienvenido <?php// echo $_SESSION['nombre'] ; ?></h1> -->
      <div class="col-3">
        <a  onclick="salir('<?php echo $_SESSION['nombre'] ; ?>')" class="btn btn-primary">Cerrar Sesión <i class="bi bi-power text-blued" width="5rem" height="2rem"></i></a>
      </div>

      <div class="col-6">
        <?php include('agregar.php');?>
      </div>
      <div class="col-3 text-end">
        <a href="ImpFactura/impFactura.php" class="btn btn-secondary " target="_blank">Generar Hash</a>
        </div>
    </div>
  </div>
<hr>
<style media="screen">/*
table.table-hover tbody tr td:hover {
  background-color: #fb9692;
}
*/
table.table-hover tbody tr:hover {
  background: #FFF8D5 ;
}
</style>
<div class="container"><br>
  <div class="row">
    <?php
	//if($stmt->rowCount() > 0){
		?>

		<div class="col-md-12">
  			<table class="table table-bordered text-center table-hover">
		<thead class="table-primary">
		<th>id</th>
		<th>Curso</th>
    <!--<th>Descripcion</th>-->
    <th>Descripcion</th>
		<th>Foto</th>
		<th>Editar</th>
		</thead>
		<tbody>

      <?php
      $stmt = $DB_con->prepare("SELECT * FROM tbl_curso ORDER BY db_id DESC ");
      $stmt->execute();
      $producto_id_ = $stmt->fetchAll(PDO::FETCH_ASSOC);

       foreach ($producto_id_ as $row ){ //extract($row);	?><!---->
          <tr>
            <td><?php echo $row['db_id'] ?></td>
            <td><?php echo $row['db_curso']; //$db_nombre; ?></td>
            <td><?php echo $row['db_descripcion']; //$db_nombre; ?></td>

              <td><img src="imagenes/<?php echo $row['db_img']; ?>" class="img-fluid" width="200px"/></td>
                <td>
                  <a href="editar.php?edit_id=<?php echo $row['db_id']; ?>"  class="btn btn-warning"> <i class="bi bi-pencil"></i></a>

<!-- <a   onclick="confirmar('<?php //echo $row['db_id']; ?>','<?php //echo $row['db_img']; ?>','<?php //echo $row['db_nombre'] ?>')" class="btn btn-danger"> <i class="bi bi-trash"></i></a> -->

<a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>

                </td>
          </tr>

      <?php	}	?>

</table>
<!-- '940653.jpg' -->
  </div>
</div>
</div>
<script type="text/javascript">
function confirmar(dato , ima , nomProducto) {
Swal.fire({
    title: '¿Estas seguro de eliminar ?',
    text: 'El produto '+nomProducto+'',
    imageUrl: 'imagenes/'+ima+' ',

     imageWidth: 200,
     imageHeight: 200,
     imageAlt: 'Custom image',
     allowOutsideClick: false,
    showCancelButton: true,
    confirmButtonColor: '#45B39D',
    cancelButtonColor: '#EC7063',
    confirmButtonText: 'Confirmar'
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
      //     'Exitosamente',
      //     'Producto eliminado correctamente',
      // 'success',
      {
        icon: 'success',
      title: 'Eliminado ',
      text: 'Producto eliminado correctamente',
      showConfirmButton: false,
    //  timer: 3000

      })
      // setTimeout(()=> location.href="https://www.google.com",1000);
      setTimeout(()=> window.location.href="crud.php?delete_id="+dato,1000);

      //window.location.href ="crud.php?delete_id="+dato;
    }

});
}


// --------------------------------------------------------------------------------------msg-cerrar-sesion

function salir(user) {
  Swal.fire({
    title: '¿ Estas seguro de cerrar sesión '+user+' ?',
    // text: 'Vuelva a interntarlo!',
    icon: 'info',
    // text: 'dfdf',
    showCancelButton: true,
    confirmButtonColor: '#48C9B0',
    cancelButtonColor: '#EC7063',
    confirmButtonText: 'Confirmar'
  }).then((msg_exit) => {
    if (msg_exit.isConfirmed) {
      window.location.href ="crud.php?exit";

    }
  });
}



// --------------------------------------------------------------------------------------msg-


// window.onload = () => {
//     alert("JavaScript works!");
// }

</script>

<script src="js/funcion-msg.js" charset="utf-8"></script>
<?php
include("includes/footer.php");
?>
