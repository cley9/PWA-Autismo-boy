<?php
	session_start();
	if (isset($_SESSION['nombre'])) {
		header('Location: user_admin.php');
	}
	include("includes/header.php");
 if (isset($_SESSION['message'])) {?>
<script type="text/javascript">
Swal.fire({
  icon: 'error',
  title: '<?= $_SESSION['message']; ?>',
  text: 'Vuelva a interntarlo!',
	showConfirmButton: false,
	timer: 3000

})

</script>


<?php session_unset(); } ?>
			<div class="container mb-5 pt-4">
						<div class="">
							<div class="  container  border  col-lg-4 shadow-lg text-center rounded-3">
								<div class="mb-2"></div>
										<div class="mb-3">
											<h3 >Usuario</h3>
										<!-- <img src="img/user2.jfif" class="rounded-circle border border-primary" alt="" height="180px"> -->
										<div class="icons-font-login">

											<i class="bi bi-person-circle icons--font--color--login"  style="  font-size: 90px;"></i>
										</div>
										</div>
		<form action="crud.php" method="post">
			<div class="mb-3">
				<label for="exampleInputEmail1" class=""> <img src="img/icons/person-fill.svg" alt=""height="22px">Correo</label>
				<input type="text" class="form-control" id="exampleInputEmail1" name="txtUsu" aria-describedby="emailHelp"  placeholder="Email">
				</div>
		  <div class="mb-3">

		    <label for="exampleInputEmail1" class="form-label">
					Contraseña</label>
				<img src="img/icons/eye-fill.svg" alt="" onclick="mostrar()" height="20px">
					<input type="password" class="form-control" id="password" name="txtPass"  placeholder="Password" aria-describedby="emailHelp" >

			  <div id="emailHelp" class="form-text">Iniciar cuenta.</div>
			</div>
			<button type="submit" name="user_login_" class="btn btn-primary mb-3"> <img src="img/icons/key.svg" class="" height="40px" alt="">Ingresar</button>
		</form>
	</div>
</div>
</div>
<script src="js/viewPassword.js" charset="utf-8"></script>

<?php
include("includes/footer.php")
?>
