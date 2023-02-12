<?php
session_start();
include 'dbconnection.php';
error_reporting(0);

if (empty($_SESSION['user_logado'])) {
	unset($_SESSION['user_logado']);
	header("Location: " . BASE_URL . "login");
}

$dados_logado = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE username = '".$_SESSION['user_logado']."'"));
$creditos = $dados_logado['credits'];
$curruser = $dados_logado["username"];
if ($dados_logado['type'] != "reseller") {
	header("Location: " . BASE_URL . "login");
	exit();
}

if (isset($_GET['id'])) {
	$adminid = $_GET['id'];
	$msg = mysqli_query($con, "DELETE FROM users WHERE username = '$adminid'");
	if ($msg) {
		$_SESSION['acao'] = '<div class="alert alert-success fade show" role="alert"> Usuário: ' . $adminid . ' Deletado.</div>';	
	}
}

if (isset($_GET['resetuserid'])) {
	$resetUID = $_GET['resetuserid'];
	$msg = mysqli_query($con, "UPDATE users SET uid = NULL WHERE username = '$resetUID'");
	if ($msg) {
		$_SESSION['acao'] = '<div class="alert alert-success fade show" role="alert"> Usuário: ' . $resetUID . ' Resetado.</div>';
	}
}

if (isset($_GET['resetall'])) {
	$resetAll = $_GET['resetall'];
	$msg = mysqli_query($con,"UPDATE users SET uid=$resetAll");
	if ($msg) {
		$_SESSION['acao'] = '<div class="alert alert-success fade show" role="alert"> Todos os Usuários foram resetados.</div>';
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
			<div class="row">
				<div class="col-md-12">
					<div class="main-card mb-3 card">
					    						<div class="card-header"><h4><i class="fa fa-angle-right"></i> Credit: <?php echo $creditos ?></h4>
						    <div class="btn-actions-pane-right actions-icon-btn">
						    	<a href="index_reseller.php?resetall=nul" class="btn btn-warning">
									<i class="fa fa-asterisk mr-1"></i> Reset All User
								</a>
								<a href="add-users" class="btn btn-success">
									<i class="fa fa-plus-circle mr-1"></i> New User
							 </a>
							</div>
                        </div>
						<div class="card-body p-2">
														<table width="100%" id="example" class="table table-hover">
							<thead class="thead-dark">
    								<tr>
    									<th>ID</th>
    									<th>User</th>
    									<th>Password</th>
    									<th>Device</th>
    									<th>Start Date</th>
    									<th>End Date</th>
    									<th>Status</th>
    									<th>Reseller</th>
    									<th>Action</th>
    								</tr>
								</thead>
								<tbody>
								    
								    	<?php 
									
									//$admins=$row['username'];
									$query_users = mysqli_query($con,"SELECT * FROM users WHERE `type` = 'cliente' AND `reseller` = '$curruser' ORDER BY id ASC");
									while ($row = mysqli_fetch_assoc($query_users)) {
									    
									?>
									
											<tr>
									<td>0</td>
										<td><?php echo $row['username']; ?></td>
										<td><?php echo $row['password']; ?></td>
                                        <td><?php if ($row['UID'] == NULL) {
                                         echo "0/1";
                                        } else {
                                         echo "1/1";
                                        } 
                                        ?></td>
										<td><?php echo $date1 = $row['registered'];?></td> 
                                        <td><?php echo $row['expired'];?></td>
	                                	<td><?php if(strtotime(date("Y/m/d")) < strtotime($date2)) echo "Active"; else { echo "Expired";} ?></td>
										<td><?php echo $row['reseller'];?></td> 
										<td>
										    																				<a href="panel.php?id=cliente1"> 
										    <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete?');"><i class="fa fa-trash-alt"></i></button>
										</a>
    										<a href="panel.php?resetuserid=cliente1">
    										    <button class="btn btn-warning btn-xs"><i class="fa fa-asterisk"></i></button>
    										</a>
    										<a href="index.php?id=cliente1">
    										    										<a href="index_reseller.php?id=cliente1">
    																				
			</a>
										</td>
									</tr>
									<?php } ?>
																	</tbody>
							</table>
							
							
						</div>
						<div class="card-footer">
						    <h4>Total Users: <?php $query_users = mysqli_query($con,"SELECT * FROM users WHERE `type`='cliente' AND `reseller` = '$curruser'"); echo mysqli_num_rows($query_users);?></h4>
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
</body>
</html>