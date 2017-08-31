<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <style>
            body{
                margin: 50px;
            }
        </style>
    </head>
    <body class="container-fuid">
        <div class="row">
            <header class="col-12">
                <nav class="navbar fixed-top navbar-light bg-light">
                    <a class="navbar-brand" href="#">Chamados</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded='false' aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="menu_cad" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Cadastros
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="menu_cad" id="menu_cad">
                                    <?php if($this->session->nivel == FALSE): ?>
                                        <li class="dropdown-item">
                                            <a class="nav-link" href="<?php echo site_url('welcome/cadUsuario'); ?>">Usuários</a>
                                        </li>
                                    <?php endif; ?>
                                    <li class="dropdown-item">
                                        <a class="nav-link" href="<?php echo site_url('welcome/cadTicket'); ?>">Tickets</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a class="nav-link" href="<?php echo site_url('welcome/cadAndamento'); ?>">Andamento</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle" id="menu_list" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Listagem
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="menu_list" id="menu_list">
                                    <li class="dropdown-item">
                                        <a class="nav-link" href="<?php echo site_url('welcome/listarUsuario'); ?>">Usuários</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a class="nav-link" href="<?php echo site_url('welcome/listarTicket'); ?>">Tickets</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a class="nav-link" href="<?php echo site_url('welcome/listarAndamento'); ?>">Andamento</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle" id="menu_alt" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Alteração
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="menu_alt" id="menu_alt">
                                    <li class="dropdown-item">
                                        <a class="nav-link" href="<?php echo site_url('welcome/alterarUsuario'); ?>">Suas Informações</a>
                                    </li>
                                    <?php if($this->session->nivel == FALSE):?>
                                        <li class="dropdown-item">
                                            <a class="nav-link" href="<?php echo site_url('welcome/alterarUsuarios'); ?>">Usuários</a>
                                        </li>
                                    <?php endif; ?>
                                    <li class="dropdown-item">
                                        <a class="nav-link" href="<?php echo site_url('welcome/alterarTicket'); ?>">Tickets</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a class="nav-link" href="<?php echo site_url('welcome/alterarAndamento'); ?>">Andamento</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('login/logOut'); ?>">Sair</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
        </div>