<?php $this->load->view('./cabecalho'); ?>

<div class="header">
    <h1>Listagem de Usuários</h1>
</div>
<div class="list_usuario">
    <table>
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Nome</th>
                <th>Setor</th>
                <th>Cargo</th>
                <th>Secretaria</th>
                <th>Matrícula</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Alterar</th>
            </tr>
        </thead>
        <tbody>
            <?php $usuarios = $this->usuario_model->listar(); ?>
            <?php foreach ($usuarios as $us): ?>
            <tr>
                <td><form id="alt" action="<?php echo site_url('usuario/alterarUsuario'); ?>"><input type="checkbox" value="<?php echo $us->id_usuario; ?>"></form></td>
                <td><?php echo $us->id_usuario; ?></td>
                <td><?php echo $us->nome; ?></td>
                <td><?php echo $us->id_setor; ?></td>
                <td><?php echo $us->id_cargo; ?></td>
                <td><?php echo $us->id_secretaria; ?></td>
                <td><?php echo $us->matricula; ?></td>
                <td><?php echo $us->cpf; ?></td>
                <td><?php echo $us->email; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button form="alt" type="submit">Alterar</button>
</div>

<?php $this->load->view('./rodape'); ?>