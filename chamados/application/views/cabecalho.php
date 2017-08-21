<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="menu">
            <ul>
                <li>
                    Cadastros
                    <ul>
                        <li><a href="<?php echo site_url('welcome/cadUsuario'); ?>">Usuários</a></li>
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
            </ul>
        </div>