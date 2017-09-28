<!DOCTYPE html>
<html lang="pt-br">
    <head> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Email</title>
    </head>
    <body>
        <div>
            <p>Segue abaixo as informações do chamado</p>
        </div>
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Solicitante</td>
                    <td>Mensagem</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($dados as $d): ?>
                <tr>
                    <td><?php echo $d['id_ticket']; ?></td>
                    <td><?php echo $d['nome']; ?></td>
                    <td><?php echo $d['mensagem']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div>
            <p>Att. <?php echo $dados['nome']?></p>
        </div>
    </body>
</html>

