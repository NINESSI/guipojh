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
$uname = $data["uname"];
if($uname == null || preg_match("([A-Z0-9]+)", $uname) === 0){
    $ackdata = array(
        "Status" => "Failed",
        "MessageString" => "Token Invalido",
        "SubscriptionLeft" => "0"
    );
    PlainDie(tokenResponse($ackdata));
}

//Token Validator
$utoken = $data["token"];
if($uname == null || preg_match("([A-Z0-9]+)", $uname) === 0){
    $ackdata = array(
        "Status" => "Failed",
        "MessageString" => "Token Invalido",
        "SubscriptionLeft" => "0"
    );
    PlainDie(tokenResponse($ackdata));
}



if($uname != "Teste"){
    $ackdata = array(
        "Status" => "Failed",
        "MessageString" => "Apk Invalido",
        "SubscriptionLeft" => "0"
    );
    PlainDie(tokenResponse($ackdata));
}

if($utoken != "https://web.whatsapp.com/"){
    $ackdata = array(
        "Status" => "Failed",
        "MessageString" => "Apk Invalido",
        "SubscriptionLeft" => "0"
    );
    PlainDie(tokenResponse($ackdata));
}

$maintence = "On";

if($maintence != "On"){
    $ackdata = array(
        "Status" => "Off",
        "Title" => "Manutenção",
        "Message" => "Voltamos as 14:15",
        "SubscriptionLeft" => "0"
    );
    PlainDie(tokenResponse($ackdata));
}

$ModMenu = "O";

if($ModMenu == "On") {
     $ackdata = array(
         "Status" => "Ligado",
         "NameMod" => "WTProVIP",
         "IdApp" => "1",
         "MessageString" => "",
    );
    PlainDie(tokenResponse($ackdata));
}

$Update = "Off";

$ackdata = array(
    "Status" => "Success",
    "Title" => "NOVA VERSAO DISPONIVEL",
    "Update" => $Update,
    "urlUpdate" => "https://wtprovp.online/",
    "Message" => "Versão atual 1.0\nVersão nova 2.0",
    "url" => "https://wtprovp.online/vip/login.php",
     "token" => "mandioca",
    "MessageString" => "",

  
);

echo tokenResponse($ackdata);


