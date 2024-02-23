<?php

include 'config.php';
include 'navbar.php';
include 'erro.php';

// Verifica se foi passado um ID válido via GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta SQL para selecionar a tarefa específica pelo ID
    $sql = "SELECT id, titulo_da_tarefa, prioridade, quem_vai_executar_a_tarefa, prazo_de_entrega, descricao_da_atividade FROM task WHERE id = :id";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Verifica se a consulta retornou alguma linha
        if ($stmt->rowCount() > 0) {
            // Exibe os detalhes da tarefa
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

            <div class="container" style="margin-top: 120px;">
                <div class="alert alert-info" role="alert">
                    Fazer atividade
                </div>
                <div class="row">

                    <div class="card-body shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                        <h5 class="card-title">ID: <?php echo $row['id']; ?></h5>
                        <p class="card-text">Título: <?php echo $row['titulo_da_tarefa']; ?></p>
                        <p class="card-text">Prioridade: <?php echo $row['prioridade']; ?></p>
                        <p class="card-text">Quem vai executar: <?php echo $row['quem_vai_executar_a_tarefa']; ?></p>
                        <p class="card-text">Prazo de entrega: <?php echo $row['prazo_de_entrega']; ?></p>
                        <p class="card-text">Descrição da atividade: <?php echo $row['descricao_da_atividade']; ?></p>
                    </div>
                </div>
            </div>
            </div>

<?php
        } else {
            // Se não houver resultados, exiba a mensagem de alerta
            echo "<div class='alert alert-warning' role='alert'>";
            echo "Nenhuma tarefa encontrada para o ID fornecido.";
            echo "</div>";
        }
    } catch (PDOException $e) {
        echo "Erro ao executar a consulta: " . $e->getMessage();
    }
} else {
    // Se não foi fornecido um ID válido, exiba uma mensagem de erro
    echo "<div class='alert alert-danger' role='alert'>";
    echo "ID inválido fornecido.";
    echo "</div>";
}

?>

<div class="container shadow-lg p-3 mb-5 bg-body-tertiary rounded">
    <form method="POST" action="">
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Comentar atividade*</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="descricao_da_atividade" placeholder="(Obrigatório)" required></textarea>
        </div>

        <div class="col-12">

            <button class="btn btn-primary" type="submit">Salvar comentario</button>

        </div>
    </form>
</div>