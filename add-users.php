<?php
session_start();
include 'dbconnection.php';
if (empty($_SESSION['user_logado'])) {
	unset($_SESSION['user_logado']);
	header("Location: " . BASE_URL . "login");
}

$dados_logado = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE username = '".$_SESSION['user_logado']."'"));
if ($dados_logado['type'] != "reseller" && $dados_logado['type'] != "admin" && $dados_logado['type'] != "reseller") {
	header("Location: ".BASE_URL . "login");
	exit();
}

if ($dados_logado['type'] != "reseller" && $dados_logado['type'] != "admin" && $dados_logado['credits'] <= 0) {
	$_SESSION['acao'] = '<div class="alert alert-danger fade show" role="alert">Seus créditos acabaram. Adquira com Error404</div>';
	header("Location: " . BASE_URL . "index");
	exit();
}	

if($dados_logado['credits'] < 1) {
	$_SESSION['acao'] = '<div class="alert alert-danger fade show" role="alert">Seus créditos acabaram. Adquira com Error404</div>';
	header("Location: " . BASE_URL . "index");
	exit();
}				
// for updating user info    
if (isset($_POST['Submit'])) {
    
    $valor1 = 1; //lite
    $valor2 = 1; //pro
    $valor3 = 1; //brutal
    
    
	$date = date("Y/m/d h:i");
	$user = isset($_POST['usuario']) ? $_POST['usuario'] : '';
	$pass = isset($_POST['senha']) ? $_POST['senha'] : '';
	$devices = isset($_POST['devices']) ? $_POST['devices'] : '';
	$endate = isset($_POST['endate']) ? $_POST['endate'] : '';
	$cargo = isset($_POST['cargo']) ? $_POST['cargo'] : '';
		$versao = isset($_POST['versao']) ? $_POST['versao'] : '';
	$vendedor = $_SESSION['user_logado'];
	
		$credit = isset($_POST['credit']) ? $_POST['credit'] : '';
		$creditchecked = mysqli_real_escape_string($con, $credit);
	
	$userchecked = mysqli_real_escape_string($con, $user);
	$passchecked = mysqli_real_escape_string($con, $pass);
	$deviceschecked = mysqli_real_escape_string($con, $devices);
	$endatechecked = mysqli_real_escape_string($con, $endate);
	$cargochecked = mysqli_real_escape_string($con, $cargo);
		$versaochecked = mysqli_real_escape_string($con, $versao);
		
		$valor = 0;
		
		if($versaochecked == "Lite") {
		    $valor = $valor1;
		} else if ($versaochecked == "Script_Executor") {
		    $valor = $valor2;
		} else {
		     $valor = $valor3;
		}
		
	$vendedorchecked = mysqli_real_escape_string($con, $vendedor);

	$check = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE username = '$userchecked'"));
	if ($check > 0) {
		$_SESSION['acao'] = '<div class="alert alert-danger fade show" role="alert">User in use, try another.</div>';
	} else {
		if($deviceschecked > 1) {
			 $_SESSION['acao']= '<div class="alert alert-danger fade show" role="alert">Maximum allowed 1 device!</div>';
		} else if ($deviceschecked < 1) {
			 $_SESSION['acao']= '<div class="alert alert-danger fade show" role="alert">Minimum allowed 1 device!</div>';
		} else {
			if ($deviceschecked == 1) {
				if ($dados_logado['type'] == "reseller") {
				    
				    	$credits = $dados_logado['credits'] - $valor;
					if ($credits < 0 || $dados_logado['credits'] < $valor) { 
					    	$_SESSION['acao'] = '<div class="alert alert-warning fade show" role="alert">' . $vendedorchecked . '-> Faltam : ' . $credits .   ' creditos para registrar esse usuario! </div>';
					    		header("Location: ".BASE_URL . "index_reseller");
					    		die();
					exit();
					
					
				
					} else {
					    
					    $query = mysqli_query($con, "INSERT INTO `users` (`username`,`password`,`registered`,`expired`,`reseller`,`type`,`credits`, `version`) VALUES ('$userchecked','$passchecked','$date','$endatechecked','$vendedorchecked','cliente','0', '$versaochecked')");
					
					if ($query) {
						$msg = mysqli_query($con, "UPDATE users SET credits = $credits WHERE username = '" . $_SESSION['user_logado'] . "'");
						if ($msg) {
							$_SESSION['acao'] = '<div class="alert alert-success fade show" role="alert">' . $userchecked . ' Added. validity: ' . $endatechecked . '</div>';
						}
					} }
					//echo "INSERT INTO `users` (`username`,`password`,`registered`,`expired`,`reseller`,`type`,`credits`) VALUES ('$userchecked','$passchecked','$date','$endatechecked','$vendedorchecked','cliente','0')";
					header("Location: ".BASE_URL . "index_reseller");
					exit();
					
					
				} else if ($dados_logado['type'] == "admin") {
				    $query = mysqli_query($con, "INSERT INTO `users` (`username`,`password`,`registered`,`expired`,`reseller`,`type`, `credits`) VALUES ('$userchecked','$passchecked','$date','$endatechecked','$vendedorchecked','$cargochecked', '$creditchecked')");
					$credits = $dados_logado['credits'] - 0;
					if ($query) {
						$msg = mysqli_query($con, "UPDATE users SET credit = $credits WHERE username = '" . $_SESSION['user_logado'] . "'");
						if ($msg) {
							$_SESSION['acao'] = '<div class="alert alert-success fade show" role="alert">' . $userchecked . ' Added. validity: ' . $endatechecked . '</div>';
						}
					}
					header("Location: " . BASE_URL . "index");
					exit();
				}  else {$_SESSION['acao'] = '<div class="alert alert-danger fade show" role="alert">You are not admin or reseller!</div>';
					header("Location: " . BASE_URL . "index");
					exit();
				}
			}
		}
	}
}
?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="en">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Regedit Official </title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="msapplication-tap-highlight" content="no">
		<link href="principal.css" rel="stylesheet">
		<link href="https://regeditofficial.in.net/main.css" rel="stylesheet">
		<link rel="shortcut icon" type="https://regeditofficial.in.net/image/x-icon" href="https://regeditofficial.in.net/favicon.ico">
	</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        
	
<body style="background-color: black;">
	<div class="app-header header-shadow bg-info header-text-light">
	  	<div class="app-header__logo">

			<div class="logo-src"></div>

			<div class="header__pane ml-auto">
				<div>
					<button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>
			</div>
		</div>
		<div class="app-header__mobile-menu">
			<div>
				<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
					<span class="hamburger-box">
						<span style="background-color:black!important" class="hamburger-inner"></span>
					</span>
				</button>
			</div>
		</div>
		<div class="app-header__menu">
			
		</div>    
		<div class="app-header__content">
		
					
			<!--<div class="app-header-left">
			
				<div class="search-wrapper">
					<div class="input-holder">
						<input type="text" class="search-input" placeholder="Buscar por...">
						<button class="search-icon"><span></span></button>
					</div>
					<button class="close"></button>
				</div>
			
			</div>-->
			<div class="app-header-right">
				<div class="header-btn-lg pr-0">
					<div class="widget-content p-0">
						<div class="widget-content-wrapper">
							<div class="widget-content-left">
								<div class="btn-group">
									<div class="top-menu">
										<ul class="nav pull-right">
										    <div>
							
								
										</ul>
									</div>
								</div>
                            </div>
						</div>
					</div>
				</div>        
			</div>
		</div>
    </div>  
	<div class="app-main">
	<div class="app-sidebar sidebar-shadow bg-dark sidebar-text-light">
		<div class="app-header__logo">
			<div class="logo-src"></div>
			<div class="header__pane ml-auto">
				<div>
					<button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>
			</div>
		</div>
		<div class="app-header__mobile-menu">
			<div>
				<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>
			</div>
		</div>
		<div class="app-header__menu">
			<span>
				<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
					<span class="btn-icon-wrapper">
						<i class="fa fa-ellipsis-v fa-w-6"></i>
					</span>
				</button>
			</span>
		</div>    
		<div class="scrollbar-sidebar">
			<div class="app-sidebar__inner">
				<ul class="vertical-nav-menu">
					<li class="app-sidebar__heading">Navigation </li> 
					<li>
												<a href="index_reseller" >
							<i class="metismenu-icon pe-7s-users"></i>
							Manage users
						</a>
											</li>
					
					
				
					<li>
					<a href="downloads">
							 <i class="metismenu-icon pe-7s-download"></i>
							Download
						</a>
						</li>
						
					<li>
					<a href="logout">
							 <i class="metismenu-icon pe-7s-back"></i>
							Logout
						</a>
					</li>
						<li class="app-sidebar__heading"><span>Welcome! <?php echo $_SESSION['user_logado']; ?></span></li>
				</ul>
			</div>
		</div>
	</div>	
		<div class="app-main__outer">
            <div class="app-main__inner">
				<div class="row mb-3">
				<div class="col-md-12">
										<a href="index_reseller.php" class="btn btn-dark"><i class="fa fa-arrow-left"></i>  Back</a>
									</div>			
				</div>
				<div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-header">Add -  Users                            </div>
                            <div class="card-body">
																<form action="" method="POST">
    								<div class="position-relative form-group">
        								<label for="exampleEmail" class="">Username</label>
        								<input type="text" name="usuario" placeholder="Enter a username" class="form-control" required>
    								</div>
    								
    								<div class="position-relative form-group">
        								<label for="exampleEmail" class="">Password</label>
        								<input type="text" name="senha" placeholder="Enter a password" class="form-control" required>
    								</div>
    								
    								<div class="position-relative form-group">
        								<label for="exampleEmail" class="">Device</label>
        								<input type="number" max="1" min="1" name="devices" value="1" class="form-control" required>
    								</div>
    								
    								<!--
    								<div style="display:none;">
    								<div class="position-relative form-group">
    								<label for="exampleEmail" class="">Start Date</label>
    								<input size="16" type="text" name="startdate" value="2022-11-02" readonly class="form-control">
    								</div>
    								
    								<div class="position-relative form-group">
    								<label for="exampleEmail" class="">Due Date</label>
    								<input size="16" type="date" name="endate" value="2022-11-02" class="form-control form_datetime" required>
    								</div>
    								</div>
    								-->
    								
    								<div class="position-relative form-group">
        								<label for="exampleEmail" class="">Start Date</label>
        								<input size="16" type="text" name="startdate" value="2022-11-02" readonly class="form-control">
    								</div>
    								
    								
    								<div class="position-relative form-group">
        								<label for="exampleEmail" class="">Seller</label>
        								<input type="text" value="<?php echo $_SESSION['user_logado']; ?>" readonly class="form-control" required>
    								</div>
    								
    								
    								
    								<div class="position-relative form-group">
        								<label for="exampleEmail" class="">Product</label>
        								<select class="form-control" name="game">
    								        								        <option value="FreeFire - Regedit" 
    								        selected>FreeFire - Regedit</option>
    					
								                								</select>
    								</div>
    								
    								
    								
    								<div class="position-relative form-group">
        								<label for="exampleEmail" class="">Type</label>
        								<select name="cargo" class="form-control">
            								            								<option value="cliente">Member</option>
        								</select>
    								</div>
    								
    								
    								
    									    								<div class="d-block text-right card-footer">
    								    <button type="submit" name="Submit" class="btn btn-success btn-lg">CREATE 07 DAYS</button>
    								</div>
    								<div class="d-block text-right card-footer">
    								    <button type="submit" name="Submit2" class="btn btn-success btn-lg">CREATE 15 DAYS</button>
    								</div>
    								<div class="d-block text-right card-footer">
    								    <button type="submit" name="Submit3" class="btn btn-success btn-lg">CREATE 30 DAYS</button>
    								</div
								</form>
							</div>
                        </div>
                    </div>
                </div>
			</div>
			    <script type="text/javascript" src="https://regeditofficial.in.net/assets/scripts/main.js"></script></body>
	
	 <div class="app-wrapper-footer">
	
			
				
			   
			</div>
		</div>
    </div>  
        </div>
    </div>
    </div>
<script type="text/javascript" src="https://regeditofficial.in.net/assets/scripts/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="https://regeditofficial.in.net/assets/scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="https://regeditofficial.in.net/assets/scripts/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="https://regeditofficial.in.net/assets/scripts/bootstrap-datetimepicker.pt-BR.js"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
		format: 'yyyy/mm/dd',
		minView: 2,
        language:  'pt-BR',
        todayBtn:  1,
		autoclose: 1
    });
</script>
	<script>
	document.getElementById("fname").style.visibility = "visible";
		</script>
</body>
</html>
