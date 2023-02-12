<?php
session_start();
unset($_SESSION['user_logado']);
if (isset($_POST['user'])) {
	include 'dbconnection.php';
	
	$usuario = trim(isset($_POST['user']) ? $_POST['user'] : '');
	$senha = trim(isset($_POST['pass']) ? $_POST['pass'] : '');
	
	$userchecked = mysqli_real_escape_string($con, $usuario);
	$passchecked = mysqli_real_escape_string($con, $senha);
	
	$query = mysqli_query($con, "SELECT * FROM users WHERE username = '".$userchecked."' AND password = '".$passchecked."'");
	$check = mysqli_num_rows($query);
	if ($check == 1) {
		$_SESSION['user_logado'] = $userchecked;
		$det = mysqli_fetch_assoc($query);
		if ($det['type'] == "reseller") {
			header("Location: ".BASE_URL . "index_reseller");
		} else if ($det['type'] == "admin") {
			header("Location: ".BASE_URL . "index");
		} else if ($det['type'] == "cliente") {
			header("Location: ".BASE_URL . "add-trial.php");
		   
		} else {
			$_SESSION['acao'] = "Você não tem permissão para acessar esta pagina.";
			session_destroy();
		}
	} else {
		$_SESSION['acao'] = "Usuário ou senha incorretos.";
	}
}
?>


<!DOCTYPE html>
<html oncontextmenu="return false" lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="pt-BR">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Regedit Official</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css'><link rel="stylesheet" href="https://regeditofficial.in.net/assets/css/style.css"></head>
    <link rel="shortcut icon" type="https://regeditofficial.in.net/image/x-icon" href="https://regeditofficial.in.net/favicon.ico">
    <body>
<!-- partial:index.partial.html -->
<div class="container">
	<div id="login-box">
		<div class="logo">
			
			<h1 class="logo-caption"><span class="tweak">Regedit </span>Official By wtmods</h1>
		</div><!-- /.logo -->
		<div class="controls">
									
																		
                                    <form action="" method="POST" class="">
                                        
                                        	<?php if (!empty($_SESSION['acao'])) { ?>
									    <div class="alert alert-danger" role="alert">
									        <?php echo $_SESSION['acao'];
									        unset($_SESSION['acao']);?>
								        </div>
								    <?php } ?>
								    
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group"><input name="user" placeholder="Username" type="text" class="form-control" required></div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="position-relative form-group"><input name="pass" placeholder="Password" type="password" class="form-control" required></div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer clearfix">
                                    <div class="float-right">
                                       <button type="submit" class="btn btn-default btn-block btn-custom">Login</button>
                                    </div>
                                </div>
								 </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
</div>


<div id="particles-js"></div>
<!-- partial -->
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css'></script>
<script src='https://code.jquery.com/jquery-1.11.1.min.js'></script><script  src="./scrit.js"></script>

</body>
</html>