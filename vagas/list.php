<?php

include __DIR__ . '/vendor/autoload.php';
use \App\Entity\Vaga;

$vagas = Vaga::getVagas();

header('Content-Type: application/json');
echo json_encode($vagas);
