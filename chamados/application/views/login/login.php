<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <style>
            body{
                margin: 50px; 
            }
        </style>
    </head>
    <body class="container">
        <div class="row align-self-center justify-content-center">
            <div class="col-6s">
                <div class="card card-default">
                    <header class="card-header">
                        <h6 class="card-title">Entre com sua Matrícula e CPF para acessar</h6>
                    </header>
                    <div class="card-body">
                        <form class="form" action="<?php echo site_url('verificar_login'); ?>" method="post">
                            <div class="form-group">
                                <label for="matricula" class="form-control-label">
                                    Matricula
                                </label>
                                <input type="text" id="matricula" class="form-control" name="matricula">
                                <small class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="cpf" class="form-control-label">
                                    CPF
                                </label>
                                <input type="text" id="cpf" class="form-control" name="cpf">
                                <small class="form-text text-muted">Digite seu CPF sem pontos e traço</small>
                            </div>
                            <div class="controls justify-content-center">
                                <button class="btn btn-primary btn-block" type="submit">Entrar</button>
                                <button class="btn btn-secondary btn-block" type="reset">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>