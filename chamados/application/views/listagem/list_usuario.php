<?php $this->load->view('./cabecalho'); ?>
<h4 class="card-header">Listagem de Usuários</h4>
<div class="card-body">
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
        <tfoot>
            <tr>
                <td colspan="9">
                    <small>Número de registros retornados: <?php echo $regs;?></small>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
<div class="card-footer">
    <nav aria-label="Paginação">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Anterior">
                    <span arai-hidden="true">&laquo;</span>
                    <span class="sr-only">Anterior</span>
                </a>
            </li>
            <li class="page-item <?php echo 'active'; ?>">
                <a class="page-link" href="">1</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="">2</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="">3</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Próximo">
                    <span aria-hiden="true">&raquo;</span>
                    <span class="sr-only">Próximo</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<?php $this->load->view('./rodape'); ?>