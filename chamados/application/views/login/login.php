<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </head>
    <body>
        <div>
            <p>Entre com sua Matrícula e CPF para acessar</p>
        </div>
        <div class="login">
            <form action="<?php echo site_url('login/verificarLogin'); ?>" method="post">
                <label>
                    Matricula:
                    <input type="text" name="matricula">
                </label>
                <br>
                <label>
                    CPF:
                    <input type="text" name="cpf">
                </label>
                <br>
                <button type="submit">Entrar</button>
                <button type="reset">Cancelar</button>
            </form>
        </div>
    </body>
</html>