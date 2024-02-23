<?php

include 'config.php';
include 'navbar.php';
include 'erro.php';

?>

<div class="container shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="margin-top: 130px;">

    <form method="POST" action="">

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

                $id = $_POST['id'];
                $titulo_da_tarefa = $_POST['titulo_da_tarefa'];
                $prioridade = $_POST['prioridade'];
                $quem_vai_executar_a_tarefa = $_POST['quem_vai_executar_a_tarefa'];
                $prazo_de_entrega = $_POST['prazo_de_entrega'];
                $descricao_da_atividade = $_POST['descricao_da_atividade'];

                // Consulta SQL para atualizar os detalhes da tarefa no banco de dados
                $sql = "UPDATE task SET 

                titulo_da_tarefa=:titulo_da_tarefa, 
                prioridade=:prioridade, 
                quem_vai_executar_a_tarefa=:quem_vai_executar_a_tarefa,
                prazo_de_entrega=:prazo_de_entrega,
                descricao_da_atividade=:descricao_da_atividade

                WHERE id=:id";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':titulo_da_tarefa', $titulo_da_tarefa);
                $stmt->bindParam(':prioridade', $prioridade);
                $stmt->bindParam(':quem_vai_executar_a_tarefa', $quem_vai_executar_a_tarefa);
                $stmt->bindParam(':prazo_de_entrega', $prazo_de_entrega);
                $stmt->bindParam(':descricao_da_atividade', $descricao_da_atividade);
                $stmt->bindParam(':id', $id);

                if ($stmt->execute()) {

                    editarSucess('Editando com sucesso!');
                } else {

                    echo "Erro ao atualizar a tarefa: " . $stmt->errorInfo()[2];
                }
            }
        }

        function editarSucess($mensagem)
        {
            echo '<div class="alert alert-success" role="alert">' . $mensagem . '</div>';
        }


        if (isset($_GET['id'])) {
            $id = $_REQUEST['id'];

            $sql = "SELECT * FROM task WHERE id = :id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        ?>

        <div class="alert alert-warning" role="alert">
            <strong>Atenção ao editar a tarefa</strong>
        </div>

        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="col-md-12 mb-3">
            <label for="validationCustom01" class="form-label">Titulo da Tarefa</label>
            <input type="text" class="form-control" id="validationCustom01" name="titulo_da_tarefa" value="<?php echo $row['titulo_da_tarefa']; ?>" placeholder="(Obrigatório)" required>
        </div>


        <div class="row">
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Prioridade*</label>
                <select class="form-select" id="validationCustom04" name="prioridade" placeholder="(Obrigatório)" required>
                    <option disabled value=""></option>
                    <option <?php if ($row['prioridade'] == '🔴 Alta') echo 'selected'; ?>>🔴 Alta</option>
                    <option <?php if ($row['prioridade'] == '🟢 Baixa') echo 'selected'; ?>>🟢 Baixa</option>
                    <option <?php if ($row['prioridade'] == '🟡 Media') echo 'selected'; ?>>🟡 Media</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Quem vai executar a tarefa?*</label>
                <select class="form-select" id="validationCustom04" name="quem_vai_executar_a_tarefa"  placeholder="(Obrigatório)" required>
                    <option selected disabled value=""></option>
                    <option <?php if ($row['quem_vai_executar_a_tarefa'] == 'Aragão') echo 'selected'; ?>>Aragão</option>
                    <option <?php if ($row['quem_vai_executar_a_tarefa'] == 'Marcio') echo 'selected'; ?>>Marcio</option>
                    <option <?php if ($row['quem_vai_executar_a_tarefa'] == 'Flavio') echo 'selected'; ?>>Flavio</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Prazo de entrega</label>
                <input type="date" class="form-control" id="validationCustom01" name="prazo_de_entrega" value="<?php echo $row['prazo_de_entrega']; ?>" placeholder="(Obrigatório)" required>
            </div>
        </div>


        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Descrição da Atividade</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="descricao_da_atividade" placeholder="(Obrigatório)" required><?php echo $row['descricao_da_atividade']; ?></textarea>
        </div>


        <div class="col-12">
            <button class="btn btn-primary" type="submit">Cadastrar Tarefa</button>
        </div>

    </form>

</div>


</form>