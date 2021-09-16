<?php
function changerClass(string $classe)
{
    include $classe. '.php';   //on inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('changerClass');

spl_autoload_register('changerClass');

try {
    $db= new PDO($dsn, $user, $password);
    //$db->setAttribut
}
catch (\Trowable $th){