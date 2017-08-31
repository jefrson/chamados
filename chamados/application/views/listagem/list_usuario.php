<?php $this->load->view('./cabecalho'); ?>
<div class="col-12">
    <div class="header">
        <h1>Listagem de Usuários</h1>
    </div>
    <div class="list_usuario">
        <table class="table table-responsive table-striped table-hover">
            <thead class="thead-default">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Setor</th>
                    <th>Cargo</th>
                    <th>Secretaria</th>
                    <th>Matrícula</th>
                    <th>CPF</th>
                    <th>E-mail</th>
                    <th>Nivel</th>
                </tr>
            </thead>
            <tbody>
                <?php $usuarios = $this->usuario_model->listar(); ?>
                <?php foreach ($usuarios as $us): ?>
                <tr>
                    <td><?php echo $us->id_usuario; ?></td>
                    <td><?php echo $us->nome; ?></td>
                    <td><?php echo $us->id_setor; ?></td>
                    <td><?php echo $us->id_cargo; ?></td>
                    <td><?php echo $us->id_secretaria; ?></td>
                    <td><?php echo $us->matricula; ?></td>
                    <td><?php echo $us->cpf; ?></td>
                    <td><?php echo $us->email; ?></td>
                    <td><?php echo $us->nivel==1?"Usuário":"Admin"; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('./rodape'); ?>