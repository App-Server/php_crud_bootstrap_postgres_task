<?php

include 'config.php';
include 'navbar.php';
include 'erro.php';

?>

<div class="container d-flex justify-content-center shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="margin-top: 130px;">

    <form class="row g-3 needs-validation" novalidate method="POST" action="">
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (
                empty($_POST['titulo_da_tarefa']) ||
                empty($_POST['prioridade']) ||
                empty($_POST['quem_vai_executar_a_tarefa']) ||
                empty($_POST['prazo_de_entrega']) ||
                empty($_POST['descricao_da_atividade'])
            ) {

                preencherCampos('Por favor, preencha todos os campos');

            } else {

                $titulo_da_tarefa = $_POST['titulo_da_tarefa'];
                $prioridade = $_POST['prioridade'];
                $quem_vai_executar_a_tarefa = $_POST['quem_vai_executar_a_tarefa'];
                $prazo_de_entrega = $_POST['prazo_de_entrega'];
                $descricao_da_atividade = $_POST['descricao_da_atividade'];

                $stmt = $conn->prepare("INSERT INTO task 
                (
                    titulo_da_tarefa, 
                    prioridade, 
                    quem_vai_executar_a_tarefa, 
                    prazo_de_entrega, 
                    descricao_da_atividade

                )   
                VALUES 
                (
                    :titulo_da_tarefa, 
                    :prioridade, 
                    :quem_vai_executar_a_tarefa,
                    :prazo_de_entrega,
                    :descricao_da_atividade

                )");

                $stmt->bindParam(':titulo_da_tarefa', $titulo_da_tarefa);
                $stmt->bindParam(':prioridade', $prioridade);
                $stmt->bindParam(':quem_vai_executar_a_tarefa', $quem_vai_executar_a_tarefa);
                $stmt->bindParam(':prazo_de_entrega', $prazo_de_entrega);
                $stmt->bindParam(':descricao_da_atividade', $descricao_da_atividade);

                if ($stmt->execute()) {

                    alertSucess('Cadastro com sucesso!');
                    
                } else {

                    erroCadastro('Erro ao cadastrar: ' . $stmt->errorInfo()[2]);
                }
            }
        }

        function preencherCampos($mensagem)
        {
            echo '<div class="alert alert-danger" role="alert">' . $mensagem . '</div>';
        }

        function alertSucess($mensagem)
        {
            echo '<div class="alert alert-success" role="alert">' . $mensagem . '</div>';
        }

        function erroCadastro($mensagem)
        {
            echo '<div class="alert alert-danger" role="alert">' . $mensagem . '</div>';
        }

        ?>

        <div class="col-md-12">
            <label for="validationCustom01" class="form-label">Titulo da Tarefa*</label>
            <input type="text" class="form-control" id="validationCustom01" name="titulo_da_tarefa" placeholder="(Obrigatório)" required>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Prioridade*</label>
            <select class="form-select" id="validationCustom04" name="prioridade" placeholder="(Obrigatório)" required>
                <option selected disabled value=""></option>
                <option>🔴 Alta</option>
                <option>🟢 Baixa</option>
                <option>🟡 Media</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Quem vai executar a tarefa?*</label>
            <select class="form-select" id="validationCustom04" name="quem_vai_executar_a_tarefa" placeholder="(Obrigatório)" required>
                <option selected disabled value=""></option>
                <option>Aragão</option>
                <option>Marcio</option>
                <option>Flavio</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Prazo de entrega*</label>
            <input type="date" class="form-control" id="validationCustom01"name="prazo_de_entrega" placeholder="(Obrigatório)" required>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Descrição da Atividade*</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="descricao_da_atividade" placeholder="(Obrigatório)" required></textarea>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Cadastrar Tarefa</button>
        </div>
    </form>
    

</div>

<br>
<br>
<br>
<br>
<br>
<br>