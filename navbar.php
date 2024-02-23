<?php

include 'theme.php';

?>


<nav class="navbar navbar-expand-lg  fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">NAVBAR</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
            Tarefa
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/create-task.php">Criar Tarefa</a></li>
            <li><a class="dropdown-item" href="/show-task.php">Lista de Tarefa</a></li>
            <li><a class="dropdown-item" href="/search-prioridade.php">Pesquisa Prioridade</a></li>
            <li><a class="dropdown-item" href="/search-quem-vai-executar.php">Pesquisa quem vai executar a tarefa</a></li>
            <li><a class="dropdown-item" href="/search-prazo-de-entrega.php">Pesquisa prazo de entrega</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
            Chamados TI
          </a>
          <!-- <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/create-task.php">Criar Tarefa</a></li>
            <li><a class="dropdown-item" href="/show-task.php">Lista de Tarefa</a></li>
            <li><a class="dropdown-item" href="/search-prioridade.php">Pesquisa Prioridade</a></li>
            <li><a class="dropdown-item" href="/search-quem-vai-executar.php">Pesquisa quem vai executar a tarefa</a></li>
            <li><a class="dropdown-item" href="/search-prazo-de-entrega.php">Pesquisa prazo de entrega</a></li>
          </ul> -->
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
            Configurações
          </a>
          <!-- <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/create-task.php">Criar Tarefa</a></li>
            <li><a class="dropdown-item" href="/show-task.php">Lista de Tarefa</a></li>
            <li><a class="dropdown-item" href="/search-prioridade.php">Pesquisa Prioridade</a></li>
            <li><a class="dropdown-item" href="/search-quem-vai-executar.php">Pesquisa quem vai executar a tarefa</a></li>
            <li><a class="dropdown-item" href="/search-prazo-de-entrega.php">Pesquisa prazo de entrega</a></li>
          </ul> -->
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="/login.php">Sair</a>
        </li>

      </ul>


    </div>
  </div>
</nav>