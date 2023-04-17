<?php

$mensagem = '';

//primeiro verifica se existe uma função status no codigo,
if (isset($_GET['status'])) {
    //
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Exluido com sucesso!!</div>';

            break;
        case 'error':
            $mensagem = '<div class="alert alert-danger">Ação Não Executada!!';
            break;
    }
}


//O código percorre um array de vagas e, para cada vaga, contatena uma nova linha para a variavel $resultados com os detalhes da vaga.
//o resultado será imprimido na tela posteriormente para exibir as informações; 
$resultados = '';
foreach ($vagas as $vaga) {
    $resultados .= '
    <tr>
        <td>' . $vaga->id . '</td>
        <td>' . $vaga->titulo . '</td>
        <td>' . $vaga->descricao . '</td>
        <td>' . ($vaga->ativo == 's' ? "Ativo" : "Inativo") . '</td>
        
        <td>' . date('d/m/Y à\s H:i:s', strtotime($vaga->data)) . '</td>
        <td>
            <a href="editar.php?id=' . $vaga->id . '">
            <button type="button" class="btn btn-primary">Editar</button>
            </a>

            <a href="excluir.php?id=' . $vaga->id . '">
            <button type="button" class="btn btn-danger">Excluir</button>
            </a>
        </td>
    </tr>';
}

// A função strlen() tem como argumento um string. Ela retorna um inteiro que é o comprimento do string (o número de caracteres do string, não contando o caractere NULL).
//então nesta linha o $resultado está recebe ndo um termal que dependendo da condição retorna um valor
// se $resultados tiver recebido algum valor $resultados vai manter o mesmo valor , se não tiver recebido nada então recene uma TR falando que nenhuma vaga foi encontrada; 
$resultados = strlen($resultados) ? $resultados : '<tr>
    <td colspan="6" class="text-center"> Nenhuma vaga encontrada</td>
    </tr>
    '
    ?>

<main>
    <?= $mensagem ?>
    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success">Nova Vaga</button>
        </a>
    </section>

    <section>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

                <!-- mesma coisa que o <?php echo $resultados ?> -->
                <!--Está imprimindo na tela a variavel $resultados que recebeu os detalhes da vaga anteriormente.-->
                <?= 
           
                json_encode($vagas)
                ?>
            </tbody>
        </table>

    </section>


</main>