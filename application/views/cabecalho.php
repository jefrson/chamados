<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <style>
            body{
                margin-top: 60px;
            }
        </style>
    </head>
    <body class="container-fluid">
        <div class="row">
            <header class="col">
                <nav class="navbar navbar-expand-md fixed-top navbar-light bg-light">
                    <a class="navbar-brand" href="<?php echo site_url('cadastro_ticket'); ?>">Chamados</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded='false' aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse mr-auto" id="menu">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="menu_cad" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Usuários
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="menu_cad" id="menu_cad">
                                    <?php if($this->session->nivel == FALSE): ?>
                                        <li class="dropdown-item">
                                            <a class="nav-link" href="<?php echo site_url('cadastro_usuario'); ?>">Cadastro</a>
                                        </li>
                                    <?php endif; ?>
                                    <li class="dropdown-item">
                                        <a class="nav-link" href="<?php echo site_url('listar_usuario'); ?>">Listar</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a class="nav-link" href="<?php echo site_url('alterar_usuario'); ?>">Suas Informações</a>
                                    </li>
                                    <?php if($this->session->nivel == FALSE): ?>
                                        <li class="dropdown-item">
                                            <a class="nav-link" href="<?php echo site_url('buscar_usuario'); ?>">Alterar</a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle" id="menu_list" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Tickets
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="menu_list" id="menu_list">
                                    <li class="dropdown-item">
                                        <a class="nav-link" href="<?php echo site_url('cadastro_ticket'); ?>">Cadastro</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a class="nav-link" href="<?php echo site_url('listar_ticket'); ?>">Listar</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a class="nav-link" href="<?php echo site_url('alterar_ticket'); ?>">Alterar</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle" id="menu_alt" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Andamento
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="menu_alt" id="menu_alt">
                                    <li class="dropdown-item">
                                        <a class="nav-link" href="<?php echo site_url('cadastro_andamento'); ?>">Cadastro</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a class="nav-link" href="<?php echo site_url('listar_andamento'); ?>">Listar</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a class="nav-link" href="<?php echo site_url('alterar_andamento'); ?>">Alterar</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('sair'); ?>">Sair</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
        </div>
        <div class="row align-self-center justify-content-center">
            <div class="col-auto">
                <div class="card card-default">
                