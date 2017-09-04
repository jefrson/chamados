<?php $this->load->view('./cabecalho'); ?>

<h4 class="card-header">Listagem de Tickets</h4>
<div class="card-body">
    <div class="row">
        <table class="table table-sm table-striped table-hover">
            <thead class="thead-default">
                <tr>
                    <th>Ticket</th>
                    <th>Solicitante</th>
                    <th>Categoria</th>
                    <th>Urgência</th>
                    <th>Responsável</th>
                    <th>Mensagem</th>
                    <th>Assunto</th>
                    <th>Data Inicial</th>
                    <th>Data Final</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tickets as $t): ?>
                    <?php if($t->ativo):?>
                        <tr>
                            <td><?php echo $t->id_ticket; ?></td>
                            <td><?php echo $t->solicitante; ?></td>
                            <td><?php echo $t->id_categoria; ?></td>
                            <td><?php echo $t->urgencia; ?></td>
                            <td><?php echo $t->responsavel; ?></td>
                            <td><?php echo $t->mensagem; ?></td>
                            <td><?php echo $t->assunto; ?></td>
                            <td><?php echo $t->data_inicial; ?></td>
                            <td><?php echo $t->data_final; ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="9">
                        <small>Número de registros retornados:</small>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<?php $this->load->view('./rodape'); ?>