<?php $this->load->view('./cabecalho'); ?>
<h4 class="card-header">Listagem de Usuários</h4>
<div class="card-body">
    <table class="table table-sm table-responsive table-hover table-bordered">
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
            <?php foreach ($usuarios as $us): ?>
            <tr>
                <td><?php echo $us->id_usuario; ?></td>
                <td><?php echo ucwords($us->nome); ?></td>
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
        <tfoot>
            <tr>
                <td colspan="9">
                    <caption>Número de registros retornados: <?php echo count($usuarios);?></caption>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
<div class="card-footer">
    <nav aria-label="Paginação">
        <?php echo $paginacao; ?>
    </nav>
</div>
<?php $this->load->view('./rodape'); ?>
