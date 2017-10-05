<?php $this->load->view('./cabecalho'); ?>

<h4 class="card-header">Listagem de Tickets</h4>
<div class="card-body">
    <div class="row">
        <table class="table table-striped table-hover table-responsive">
            <thead class="thead-default">
                <tr>
                    <th>Ticket</th>
                    <?php if($this->session->nivel == FALSE): ?>
                        <th>Solicitante</th>
                    <?php endif; ?>
                    <th>Categoria</th>
                    <th>Urgência</th>
                    <th>Responsável</th>
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
                            <?php if($this->session->nivel == FALSE): ?>
                                <td><?php echo $t->solicitante; ?></td>
                            <?php endif; ?>
                            <td><?php echo $t->id_categoria; ?></td>
                            <td><?php echo $t->urgencia; ?></td>
                            <td><?php echo $t->responsavel; ?></td>
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
                        <caption>Número de registros retornados: <?php echo count($tickets);?></caption>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="card-footer">
    <nav aria-label="Paginação">
        <?php echo $paginacao; ?>
    </nav>
</div>
<?php $this->load->view('./rodape'); ?>