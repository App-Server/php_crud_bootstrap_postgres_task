<?php

include 'config.php';
include 'navbar.php';
include 'erro.php';

?>

<div class="container" style="margin-top: 120px;">
    <div class="alert alert-secondary" role="alert">
        Pesquisa tarefas
    </div>
    <div class="row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Prazo de entrega</label>
                            <input type="date" class="form-control" id="validationCustom01" name="prazo_de_entrega" placeholder="(Obrigatório)" required>
                        </div>
                        <button class="btn btn-primary mt-3" type="submit">Pesquisar</button>
                    </form>
                </div>
            </div>
        </div>

    </div>


    <hr>

    <p>Resultado</p>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupere os critérios de pesquisa do formulário
        $prazo_de_entrega = $_POST['prazo_de_entrega'];

        // Construa a consulta SQL com base nos critérios fornecidos
        $sql = "SELECT * FROM task WHERE 1=1"; // Comece com uma consulta básica

        if (!empty($prazo_de_entrega)) {
            $sql .= " AND prazo_de_entrega = :prazo_de_entrega";
        }

        // Prepare a consulta
        $stmt = $conn->prepare($sql);

        // Vincule os parâmetros, se houver
        if (!empty($prazo_de_entrega)) {
            $stmt->bindParam(':prazo_de_entrega', $prazo_de_entrega);
        }

        // Execute a consulta
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Exibir os resultados
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Exibir os resultados como necessário
                echo "<div class='mt-3 shadow-lg p-3 mb-5 bg-body-tertiary rounded'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>ID: " . $row['id'] . "</h5>";
                echo "<p class='card-text'>Título: " . $row['titulo_da_tarefa'] . "</p>";
                echo "<p class='card-text'>Prioridade: " . $row['prioridade'] . "</p>";
                echo "<p class='card-text'>Quem vai executar: " . $row['quem_vai_executar_a_tarefa'] . "</p>";
                echo "<p class='card-text'>Prazo de entrega: " . $row['prazo_de_entrega'] . "</p>";
                //echo "<p class='card-text'>Descrição da atividade: " . $row['descricao_da_atividade'] . "</p>";
                echo "<a href='ver-tarefa.php?id=" . $row['id'] . "' class='btn btn-success' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'>Ver tarefa</a>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            // Se não houver resultados, exiba a mensagem de alerta
            echo "<div class='alert alert-warning' role='alert'>";
            echo "Nenhuma tarefa encontrada";
            echo "</div>";
        }
    }

    ?>
</div>