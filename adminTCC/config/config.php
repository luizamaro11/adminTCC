<?php

#Arquivos diretórios raizes
$pastaInterna = "adminTCC/";
define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}/{$pastaInterna}");

if(substr($_SERVER['DOCUMENT_ROOT'], -1) == '/'){
    define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$pastaInterna}");    
} else{
    define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}/{$pastaInterna}");
}

#Diretórios Especificos
define('DIRIMG', DIRPAGE. "public/imagens/");
define('DIRCSS', DIRPAGE. "public/css/");
define('DIRJS', DIRPAGE. "public/js/");



