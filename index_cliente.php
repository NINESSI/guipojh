<?php
session_start();
include 'dbconnection.php';
error_reporting(0);

if (empty($_SESSION['user_logado'])) {
    unset($_SESSION['user_logado']);
    header("Location: " . BASE_URL . "login");
}

$dados_logado = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE username = '".$_SESSION['user_logado']."'"));

$curruser = $dados_logado["username"];
$version = $dados_logado["version"];



?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="pt-BR">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>WTProVIP - Clientes</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="msapplication-tap-highlight" content="no">
        <link href="main.css" rel="stylesheet">
        <style>
        
       
            hx2{
                font-size: 50px;
                padding: 50px;
                color: blue;
                text-align: center;
                
            }
            
            .hr4 {
  border: 0;
  border-top: 1px dashed #CCC;
  border-bottom: 2px solid #CCC;
  height: 3px;
}

        </style>
    </head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        
    <?php include('header.php'); ?>

    <?php include('menu.php'); ?>
    
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <?php $total_credit = 0; ?>
                      
                        <div class="card-body p-2">
                            <?php if (!empty($_SESSION['acao'])) { echo $_SESSION['acao'].'<hr>'; unset($_SESSION['acao']); } ?>
                            <table width="100%" class="table table-hover">
                                <thead class="thead-dark">
                                  
                                  <br> <hx2 class"btn btn-danger"> 🔰 Apk-Jogo 🔰</hx2><br><br>
                                  
                                    <tr>
                                        <th>Jogo</th>
                                        <th>Status</th>
                                        <th>Versao</th>
                                        <th>Donwload</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    <tr>
                                        
                                        <td>Garena Free Fire: Heróis 32bit</td>
                                         <td><hx class="btn btn-success"><hx> Online</hx></hx></td>
                                        <td>V1.80.0</td>
                                        <td><a class="btn btn-info"  href="https://m.apkpure.com/br/garena-free-fire-android-il/com.dts.freefireth/download/2019115047-APK-38a6ca9ca81b9e6abd5410faf3eb78b1?from=variants%2Fversion">Baixe Aqui</a></td>
                                    <tr>
                                         <td>Garena Free Fire: Heróis 64bit</td>
                                         <td><hx class="btn btn-success"><hx> Online</hx></hx></td>
                                        <td>V1.80.0</td>
                                        <td><a class="btn btn-info" href="https://m.apkpure.com/br/garena-free-fire-android-il/com.dts.freefireth/download/2019115048-APK-8d35ba6bd46faa1cb11f9358ccfec0f1?from=variants%2Fversion">Baixe Aqui</a></td>
                                      
                                    </tr>
                               
                                </tbody>
                            </table>
                            
                            
                            
                            <hr class="hr4">
                            <hr class="hr4">
                            
                            <table width="100%" class="table table-hover">
                                <thead class="thead-dark">
                                  
                                  <br> <hx2 class"btn btn-danger"> 🔰 Virtual/ No Root 🔰</hx2><br><br>
                                  
                                    <tr>
                                        <th>Apk</th>
                                        <th>Status</th>
                                        <th>Versao</th>
                                        <th>Donwload</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    <tr>
                                        
                                        <td>Virtual - Vmos</td>
                                        <td><hx class="btn btn-warning"><hx> Offline</hx></hx></td>
                                        <td>32bit</td>
                                        <td><a class="btn btn-success disabled" href="donwloadapk.php?version=<?php echo $version; ?>">Baixe Aqui</a></td>
                                      
                                    </tr>
                                    
                                    <tr>
                                        
                                        <td>Virtual - X8</td>
                                        <td><hx class="btn btn-success"><hx> Online</hx></hx></td>
                                        <td>32bit</td>
                                        <td><a class="btn btn-info" href="donwloadapk.php?version=<?php echo $version; ?>">Baixe Aqui</a></td>
                                      
                                    </tr>
                                    
                                    <tr>
                                        
                                        <td>Virtual - F1</td>
                                        <td><hx class="btn btn-success"><hx> Online</hx></hx></td>
                                        <td>32bit</td>
                                        <td><a class="btn btn-info" href="https://apkadmin.com/uu2ya3zsql6u/f1vm-v1.3.1.3.03-64gpfn-gp-release-withrom-202202231119.apk.html">Baixe Aqui</a></td>
                                      
                                    </tr>
                                    
                                     <tr>
                                        
                                        <td>Virtual - X8</td>
                                        <td><hx class="btn btn-success"><hx> Online</hx></hx></td>
                                        <td>32bit</td>
                                        <td><a class="btn btn-info" href="donwloadapk.php?version=<?php echo $version; ?>">Baixe Aqui</a></td>
                                      
                                    </tr>
                                    
                                     <tr>
                                        
                                        <td>Virtual - VPhoneGaga</td>
                                        <td><hx class="btn btn-success"><hx> Online</hx></hx></td>
                                        <td>32bit</td>
                                        <td><a class="btn btn-info" href="https://www.mediafire.com/file/ack4qt9kdplj1m9/com.vphonegaga.titan_2.1.4_3315.apk/file">Baixe Aqui</a></td>
                                      
                                    </tr>
                               
                                </tbody>
                            </table>
                            
                            <hr class="hr4">
                            <hr class="hr4">
                            
                            
                              <table width="100%" class="table table-hover">
                                <thead class="thead-dark">
                                  
                                  <br> <hx2 class"btn btn-danger"> 🔰 Tuturiais 🔰</hx2><br><br>
                                  
                                    <tr>
                                        <th>Video</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                       
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                  
                                    
                                     <tr>
                                        
                                        <td>Como instalar Mod!</td>
                                        <td><a class="btn btn-info" href="https://www.youtube.com/watch?v=2utFLFOY9UY">Ver Aqui</a></td>
                                         <td><hx class="btn btn-success"><hx> Online</hx></hx></td>
                                        
                             
                                      
                                    </tr>
                               
                                </tbody>
                            </table>
                            
                            
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        
        <?php include('footer.php'); ?>
        
    </div>
</body>
</html>