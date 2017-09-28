<?php $this->load->view('./cabecalho'); ?>
<h4 class="card-header">Listagem de Andamentos</h4>
<div class="card-body">
    <table class="table table-responsive table-striped table-hover">
        <thead class="thead-default">
            <tr>
                <th>Andamanto</th>
                <th>Ticket</th>
                <th>Mensagem</th>
                <th>Data/Hora</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($andamentos as $and): ?>
                <tr>
                    <td><?php echo $and->id_andamento; ?></td>
                    <td><?php echo $and->id_ticket; ?></td>
                    <td><?php echo $and->mensagem; ?></td>
                    <td><?php echo $and->data_hora; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">
                    <caption>Número de registros retornados: <?php echo count($andamentos); ?></caption>
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