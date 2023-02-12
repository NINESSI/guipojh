<?php
session_start();
include 'dbconnection.php';
if (empty($_SESSION['user_logado'])) {
	unset($_SESSION['user_logado']);
	header("Location: " . BASE_URL . "login");
}

$dados_logado = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE username = '".$_SESSION['user_logado']."'"));
if ($dados_logado['type'] != "admin") {
	header("Location: " . BASE_URL . "login");
	exit();
}

if(isset($_GET['id']) && $dados_logado['type'] == "admin") {
	$adminid = $_GET['id'];
	$check = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE username = '$adminid'"));
	if ($check >= 1) {
		$msg = mysqli_query($con, "DELETE FROM users WHERE username = '$adminid'");
		if ($msg) {
			$_SESSION['acao'] = '<div class="alert alert-success fade show" role="alert"> User: ' . $adminid . ' deleted.</div>';	
		}
	}
}

if(isset($_GET['resetall'])) {
	$resetAll = $_GET['resetall'];
	if ($dados_logado['type'] == "admin") {
	    $msg = mysqli_query($con, "UPDATE users SET uid=$resetAll");
    	if ($msg) {
    		$_SESSION['acao'] = '<div class="alert alert-success fade show" role="alert"> All users reseted.</div>';
    	}
    }
}

if (isset($_GET['resetuserid'])) {
	$resetUID = $_GET['resetuserid'];
	$msg = mysqli_query($con, "UPDATE users SET uid = NULL WHERE username = '$resetUID'");
	if($msg) {
		$_SESSION['acao']='<div class="alert alert-success fade show" role="alert"> User: '.$resetUID.' reseted.</div>';
	}
}

if(isset($_GET['adddays']) && $dados_logado['type'] == "admin")
{
	$daysCount = $_GET['adddays'];
	$msg = mysqli_query($con,"UPDATE users SET `expired` = DATE_ADD(`expired` , INTERVAL 1 DAY) WHERE `expired` > CURDATE();");
	if ($msg)
	{
		$_SESSION['acao']='<div class="alert alert-success fade show" role="alert"> Added '.$daysCount.' day to all users.</div>';
	}
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="pt-BR">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>WTP</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="msapplication-tap-highlight" content="no">
		<link href="main.css" rel="stylesheet">
	</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        
	<?php include('header.php'); ?>

	<?php include('menu.php'); ?>
	
	 <div class="modal fade" id="thankyouModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Obrigado por se registrar!!</h4>
      </div>
      <div class="modal-body">
          <p>Enviamos um email para você, Por Favor verifique sua caixa de spam! Contas que nao confirmarem o email em ate 24 horas a sua conta será deletada; </p>  <br>  <p>Efetue login clicando no botão abaixo!</p>
          <button type="button" class="btn btn-primary"><a href="login.php">Ok</a></button>
      </div>    
    </div>
  </div>
</div>
	
	<div class="app-main__outer">
        <div class="app-main__inner">
			<div class="row">
				<div class="col-md-12">
					<div class="main-card mb-3 card">
						<div class="card-header"><h4><i class="fa fa-angle-right"></i> Todos os Usuarios </h4>
							<div class="btn-actions-pane-right actions-icon-btn">
								<?php if ($dados_logado['type'] == "admin") { ?>
								<a href="index.php?adddays=1" class="btn btn-info">
									<i class="fa fa-plus-circle mr-1"></i> Adicionar 1 Dia
								</a>
								<a href="index.php?resetall=null" class="btn btn-info">
									<i class="fa fa-asterisk mr-1"></i> Resetar Todos
								</a>
								<?php } ?>
						     	<?php if ($dados_logado['type'] == "reseller") { ?>
								<a href="index.php?resetall=null" class="btn btn-info">
									<i class="fa fa-asterisk mr-1"></i> Resetar Todos
								</a>
								<?php } ?>
							<!--	<a href="add-users" class="btn btn-info">
									<i class="fa fa-user mr-1"></i> Novo Usuario
								</a> -->
									<a href="add-reseller" class="btn btn-info">
									<i class="fa fa-user mr-1"></i> Novo Vendedor
								</a>
								

							<!--
								<a href="add-days" class="btn btn-info">
									<i class="fa fa-plus-circle mr-1"></i> Adicionar Dias
								</a> -->
							</div>
                        </div>
                        <?php $cur_user = $_SESSION['user_logado']; $active_count = 0; $expired_count = 0;?>
						<div class="card-body p-2">
							<?php if(!empty($_SESSION['acao'])){ echo $_SESSION['acao'].'<hr>'; unset($_SESSION['acao']); }?>
							<table width="100%" id="example" class="table table-hover">
								<thead class="thead-dark">
								<tr>
									<th>ID</th>
									<th>Usuario</th>
									<th>Senha</th>
									<th>Devices</th>
									<th>Validade</th>
									<th>Expirar</th>
									<th>Status</th>
									<th>Vendedor</th>
								
									<th>Cargo</th>
									<th>Versão</th>
									
									<th>Saldo</th>
					
									
									<th>Editar</th>
									
								</tr>
								</thead>
								<tbody>
									<?php 
									
									//$admins=$row['username'];
									$credits = $dados_logado['credits'];
									$query_users = mysqli_query($con,"SELECT * FROM users WHERE `type` != 'Admin' ORDER BY id ASC");
									/*
									$cur_user = $_SESSION['user_logado'];
									$query_users = mysqli_query($con,"SELECT * FROM tokens WHERE 'Vendedor' = $cur_user");
									print_r($query_users);
									*/
									while ($row = mysqli_fetch_assoc($query_users)) {
										if (($dados_logado['type'] == "reseller" && $row['type'] == "member" && strtolower($row['reseller']) == strtolower($_SESSION['user_logado'])) || $dados_logado['type'] == "admin") {
									?>
									<tr>
										<td><?php echo $row['id'];?></td>
										<td><?php echo $row['username'];?></td>
										<td><?php echo $row['password'];?></td>
										<td>
										<?php 
										if($row['uid'] == NULL){
											echo "0/1"; 
										}else{
											echo "1/1";
										}
										?>
										</td>
										<td><?php echo $row['registered'];?></td>
										<td><?php echo $row['expired'];?></td>
										<td>
										<?php if(strtotime(date("Y-m-d h:i")) <= strtotime($row['expired'])) {
										    if ($row['type'] == "cliente") {
										        $active_count++;
										    }
										    echo "Active";
										} else {
										    if ($row['type'] == "cliente") {
										        $expired_count++;
										    }
										    echo "Expired";
										} ?>
										</td>
										<td><?php echo $row['reseller'];?></td>
									
										<td><?php echo $row['type'];?></td>
										<td><?php echo $row['version']; ?></td>
										
										<td><?php if($row["type"] == "cliente") { echo "---";} else { echo $row['credits'] . "$";} ?></td>
										
										<td>
										<?php if ($dados_logado['type'] == "master" || $dados_logado['type'] == "admin") { ?>
										<a href="edit-users.php?id=<?php echo $row['username']; ?>"> 
										    <button class="btn btn-primary btn-xs"><i class="fa fa-pen"></i></button>
										</a>
										<a href="index.php?id=<?php echo $row['username']; ?>"> 
										    <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete?');"><i class="fa fa-trash-alt"></i></button>
										</a>
										<?php } ?>
										<a href="index.php?resetuserid=<?php echo $row['username']; ?>"> 
										    <button class="btn btn-warning btn-xs"><i class="fa fa-asterisk"></i></button>
										</a>
										<a href="add-days.php?user=<?php echo $row['username']; ?>"> 
										    <button class="btn btn-success btn-xs"><i class="fa fa-plus"></i></button>
										</a>
										</td>
									</tr>
									<?php
										}
									}
									if ($dados_logado['type'] == "reseller") {
									?>
									<h2>Credit: <?php echo $credits; ?></h2>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="card-footer">
						    <h6>Total Clientes : <?php echo ($dados_logado['type'] == "admin") ? mysqli_num_rows(mysqli_query($con,"SELECT * FROM users WHERE `type`='cliente'")) : mysqli_num_rows(mysqli_query($con,"SELECT * FROM users WHERE `type`='cliente' AND `reseller`='$cur_user'"));?></h6>
						    <hr>
						    <h6>Total Vendedor : <?php echo ($dados_logado['type'] == "admin") ? mysqli_num_rows(mysqli_query($con,"SELECT * FROM users WHERE `type`='reseller'")) : mysqli_num_rows(mysqli_query($con,"SELECT * FROM users WHERE `type`='reseller'"));?></h6>
						    <hr>
						    <h6>Total Ativos : <?php echo $active_count; ?></h6>
						    <hr>
						    <h6>Total Expirados : <?php echo $expired_count; ?></h6>
						</div>
					</div>
				</div>
			</div>
        </div>
		<?php include('footer.php'); ?>
	</div>
</body>
</html>