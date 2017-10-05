<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="header">
            <h1>Chamados</h1>
        </div>
        <div id="usuario">
            <form action="<?php echo site_url('usuario/adicionar'); ?>" method="post" class="">
                <label>
                    Nome:
                    <input type="text" name="nome" maxlength="30">
                </label>
                <label>
                    Setor:
                    <input type="text" name="id_setor">
                </label>
                <label>
                    Cargo:
                    <input type="text" name="id_cargo">
                </label>
                <label>
                    Secretaria:
                    <input type="text" name="id_secretaria">
                </label>
                <label>
                    Matricula:
                    <input type="text" name="id_matricula">
                </label>
                <label>
                    CPF:
                    <input type="text" name="cpf">
                </label>
                <label>
                    E-mail:
                    <input type="email" name="email">
                </label>
                <button type="submit">OK</button>
            </form>
        </div>
    </body>
</html>