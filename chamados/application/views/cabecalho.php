<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <h6><?php echo "Logado em: ".$_SESSION['nome']; ?></h6>
        <div id="menu">
            <ul>
                <li>
                    Cadastros
                    <ul>
                        <?php if($this->session->nivel == FALSE): ?>
                            <li><a href="<?php echo site_url('welcome/cadUsuario'); ?>">Usuários</a></li>
                        <?php endif; ?>
                        <li><a href="<?php echo site_url('welcome/cadTicket'); ?>">Tickets</a></li>
                        <li><a href="<?php echo site_url('welcome/cadAndamento'); ?>">Andamento</a></li>
                    </ul>
                </li>
                <li>
                    Listagem
                    <ul>
                        <li><a href="<?php echo site_url('welcome/listarUsuario'); ?>">Usuários</a></li>
                        <li><a href="<?php echo site_url('welcome/listarTicket'); ?>">Tickets</a></li>
                        <li><a href="<?php echo site_url('welcome/listarAndamento'); ?>">Andamento</a></li>
                    </ul>
                </li>
                <li>
                    Alteração
                    <ul>
                        <li><a href="<?php echo site_url('welcome/alterarUsuario'); ?>">Suas Informações</a></li>
                        <?php if($this->session->nivel == FALSE):?>
                            <li><a href="<?php echo site_url('welcome/alterarUsuarios'); ?>">Usuários</a></li>
                        <?php endif; ?>
                        <li><a href="<?php echo site_url('welcome/alterarTicket'); ?>">Tickets</a></li>
                        <li><a href="<?php echo site_url('welcome/alterarAndamento'); ?>">Andamento</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo site_url('login/logOut'); ?>">Sair</a></li>
            </ul>
        </div>
        </header>