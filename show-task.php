<?php

include 'config.php';
include 'navbar.php';
include 'erro.php';

$sql = "SELECT id, titulo_da_tarefa, prioridade, quem_vai_executar_a_tarefa, prazo_de_entrega, descricao_da_atividade FROM task ";

try {
    $stmt = $conn->query($sql);

    if (!$stmt) {

        die("Erro ao executar a consulta: " . $conn->errorInfo()[2]);
    }
} catch (PDOException $e) {

    echo "Erro ao excutar a consultar: " . $e->getMessage();
}

?>

<div class="container" style="margin-top: 120px;">
    <div class="alert alert-secondary" role="alert">
        Lista de Tarefas!
    </div>
</div>


<div class="container" style="margin-top: 30px;">
    <div class="row">
        <?php

        if ($stmt->rowCount() > 0) {
            // Loop para exibir os dados em cartões
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
                <div class="col-md-12 ">
                    <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">

                        <div class="card-body mb-3">
                            <p class="card-title">Titulo da tareta: <?php echo $row["titulo_da_tarefa"]; ?></p>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    Prioridade: <?php echo $row["prioridade"]; ?>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card-text">Quem vai executar: <?php echo $row["quem_vai_executar_a_tarefa"]; ?></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card-text">Prazo de entrega: <?php echo $row["prazo_de_entrega"]; ?></div>
                                </div>
                            </div>

                            <!-- <p class="card-text">Descrição da atividade: <?php echo $row["descricao_da_atividade"]; ?></p> -->
                            <a href="ver-tarefa.php?id=<?php echo $row['id']; ?>" class="btn btn-success" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Ver tarefa</a>
                            <a href="edit-task.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Editar</a>
                            <a href="delete-task.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Excluir</a>
                        </div>
                    </div>
                </div>
        <?php
            } // Fechamento do while
        } else {
        }

        ?>
    </div>
</div>



<br>
<br>
<br>
<br>