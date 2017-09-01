<?php $this->load->view('./cabecalho'); ?>

<h4 class="card-header">Listagem de Tickets</h4>
<div class="card-body">
    <div class="row">
        <table class="table table-sm table-striped table-hover">
            <thead class="thead-default">
                <tr>
                    <th>Ativo</th>
                    <th>Ticket</th>
                    <th>Solicitante</th>
                    <th>Categoria</th>
                    <th>Urgência</th>
                    <th>Responsável</th>
                    <th>Mensagem</th>
                    <th>Assunto</th>
                    <th>Data Inicial</th>
                    <th>Data Final</th>
                    <th>Anexo</th>
                </tr>
            </thead>
            <tbody>
                <?php $tickets = $this->ticket_model->listar(); ?>
                <?php foreach ($tickets as $t): ?>
                <tr>
                    <td><?php echo $t->ativo==0?"Inativo":"Ativo"; ?></td>
                    <td><?php echo $t->id_ticket; ?></td>
                    <td><?php echo $t->solicitante; ?></td>
                    <td><?php echo $t->id_categoria; ?></td>
                    <td><?php echo $t->urgencia; ?></td>
                    <td><?php echo $t->responsavel; ?></td>
                    <td><?php echo $t->mensagem; ?></td>
                    <td><?php echo $t->assunto; ?></td>
                    <td><?php echo $t->data_inicial; ?></td>
                    <td><?php echo $t->data_final; ?></td>
                    <td><?php echo $t->anexo; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('./rodape'); ?>