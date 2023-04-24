<?php
namespace App\Db;

require "./app/db/Database.php";

$_POST = json_decode(file_get_contents("php://input"), true);

var_dump($_POST);
var_dump($_REQUEST);

(new Database('vagas'))->update('id = ' . $_POST['id'], [
    'ativo' => $_POST['ativo'],
]);


header("Content-Type: text/plain");