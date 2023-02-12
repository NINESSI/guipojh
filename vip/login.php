<?php

include 'init.php';


//initialization
$crypter = Crypter::init();
$privatekey = readFileData("Keys/PrivateKey.prk");

function tokenResponse($data){
    global $crypter, $privatekey;
    $data = toJson($data);
    $datahash = sha256($data);
    $acktoken = array(
        "Data" => profileEncrypt($data, $datahash),
        "Sign" => toBase64($crypter->signByPrivate($privatekey, $data)),
        "Hash" => $datahash
    );
    return toBase64(toJson($acktoken));
}

//token data
$token = fromBase64($_POST['token']);
$tokarr = fromJson($token, true);

//Data section decrypter
$encdata = $tokarr['Data'];
$decdata = trim($crypter->decryptByPrivate($privatekey, fromBase64($encdata)));
$data = fromJson($decdata);

//Hash Validator
$tokhash = $tokarr['Hash'];
$newhash = sha256($encdata);

if (strcmp($tokhash, $newhash) == 0) {
    PlainDie();
}


//Username Validator
$uname = mysqli_real_escape_string($con, $data["uname"]);
if($uname == null || preg_match("([a-zA-Z0-9]+)", $uname) === 0){
    $ackdata = array(
        "Status" => "Failed",
        "MessageString" => "Usuario Invalido",
        "SubscriptionLeft" => "0"
    );
    PlainDie(tokenResponse($ackdata));
}

//Password Validator
$pass =  mysqli_real_escape_string($con, $data["pass"]);
if($pass == null || !preg_match("([a-zA-Z0-9]+)", $pass) === 0){
    $ackdata = array(
        "Status" => "Failed",
        "MessageString" => "Senha Invalida",
        "SubscriptionLeft" => "0"
    );
    PlainDie(tokenResponse($ackdata));
}



//Version Validator
$verss =  mysqli_real_escape_string($con, $data["version"]);
if($verss == null || !preg_match("([a-zA-Z0-9]+)", $verss) === 0){
    $ackdata = array(
        "Status" => "Failed",
        "MessageString" => "Versao Invalida",
        "SubscriptionLeft" => "0"
    );
    PlainDie(tokenResponse($ackdata));
}


$uidup = $data["cs"];

// timer detect
$amemem = $con->query("SELECT * FROM `tentativas` WHERE `uid` = '$uidup'");
if($amemem->num_rows > 0){
    
    $eee = $amemem->fetch_assoc();
    $currentTimer = $eee["timer"];
    $currentDate = date('Y-m-d h:i:s');
    
    $start  = new \DateTime($currentDate);
    $end    = new \DateTime($currentTimer);
   
    $interval = $start->diff( $end );
    $sec = $interval->s . " Segundos";
    $dias =  $interval->i . " Minutos";
  
    
    if(strtotime(date("Y-m-d h:i:s")) < strtotime($eee['timer'])){
    $ackdata = array(
        "Status" => "Failed",
        "MessageString" => "Aguarde $dias e $sec para tentar novamente!",
        "SubscriptionLeft" => "0"
    );
    PlainDie(tokenResponse($ackdata));
}
    
}



$query = $con->query("SELECT * FROM `users` WHERE `username` = '".$uname."' AND `password` = '".$pass."'");
$txte = "";
if($query->num_rows < 1){
    
$queryy = $con->query("SELECT * FROM `tentativas` WHERE `uid` = '$uidup'");
// Usuario primeira vez!
if($queryy->num_rows < 1){
    
   $timer11 = date('Y-m-d h:i:s', strtotime('+20 seconds'));
   $nnt = 1;
   $queryy2 = $con->query("INSERT INTO `tentativas` (`uid`, `timer`, `tentativas`) VALUES ('$uidup', '$timer11', '$nnt')"); 
   
    
} else {
    
    $ress = $queryy->fetch_assoc();
    
    $id = $ress["id"];
    $tentativasn = $ress["tentativas"];
    $tentativas = $ress["tentativas"] +1;
    $nnt = $tentativas;
    $timerr = $ress["timer"];
    $timer =0;

$timer1 = date('Y-m-d h:i:s', strtotime('+20 seconds'));
$timer2 = date('Y-m-d h:i:s', strtotime('+40 seconds'));
$timer3 = date('Y-m-d h:i:s', strtotime('+60 seconds'));
$timer4 = date('Y-m-d h:i:s', strtotime('+120 seconds'));
$timer5 = date('Y-m-d h:i:s', strtotime('+300 seconds'));

if($tentativas == 1) {
     $timer = $timer1;
}
else if ($tentativas == 2) {
    $timer = $timer2;
} else if($tentativas == 3) {
    $timer = $timer3;
} else if($tentativas == 4) {
    $timer = $timer4;
} else if($tentativas == 5) {
    $txte = " - Suas tentativas serão resetadas em Breve!";
    $timer = $timer5;
} else if($tentativas > 5) {
     $nnt = 5;
     $timer = NULL;
     $tentativas = 0;
     // $queryy2 = $con->query("DELETE FROM `tentativas` WHERE `tentativas`.`id` = $id"); 
}

 $queryy2 = $con->query("UPDATE `tentativas` SET `timer` = '$timer', `tentativas` = '$tentativas' WHERE `tentativas`.`id` = $id"); 

}

    
    $ackdata = array(
        "Status" => "Failed",
        "MessageString" => "Usuario ou senha incorretos! - Tentativa $nnt $txte",
        "SubscriptionLeft" => "0"
    );
    PlainDie(tokenResponse($ackdata));
}

$res = $query->fetch_assoc();

if(strtotime(date("Y-m-d h:i")) > strtotime($res['expired'])){
    $ackdata = array(
        "Status" => "Failed",
        "MessageString" => "Seus Dias Acabou Renove!",
        "SubscriptionLeft" => "0"
    );
    PlainDie(tokenResponse($ackdata));
}




if($res["uid"] == NULL){
    $query = $con->query("UPDATE `users` SET `uid` = '$uidup' WHERE `username` = '".$uname."' AND `password` = '".$pass."'");
}

else if($res["uid"] != $uidup) {
     
  
    $ackdata = array(
        "Status" => "Failed",
        "MessageString" => "Dispositivo Não autorizado!",
        "SubscriptionLeft" => "0"
    );
    PlainDie(tokenResponse($ackdata));
}

$versionuser = $res["version"];
if($verss != $versionuser && $versionuser != "Todas") {
     $ackdata = array(
        "Status" => "Failed",
        "MessageString" => "Seu Login Não Tem Permissão Para Essa Versão!",
        "SubscriptionLeft" => "0"
    );
    PlainDie(tokenResponse($ackdata));
}


$ackdata = array(
    "Status" => "Success",
    "MessageString" => "",
    "Username" => $res["username"],
    "SubscriptionLeft" => $res["expired"],
    "Validade" => $res["expired"],
    "Version" => $res["version"],
    "Vendedor" => $res["reseller"],
    "RegisterDate" => $res["registered"],
    $database = date_create($res["expired"]),
$datadehoje = date_create(),
$resultado = date_diff($database, $datadehoje),
$dias = date_interval_format($resultado, '%a'),
"Dias" => "Seu Acesso Expirar Em $dias dias"
);

echo tokenResponse($ackdata);
