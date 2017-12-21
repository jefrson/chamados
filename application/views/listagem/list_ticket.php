<?php $this->load->view('./cabecalho'); ?>

<h4 class="card-header">Listagem de Tickets</h4>
<div class="card-body">
    <div class="row">
        <table class="table table-sm table-hover table-responsive table-bordered">
            <thead class="thead-default">
                <tr>
                    <th></th>
                    <th>Ticket</th>
                    <?php if($this->session->nivel == 0 || $this->session->nivel == 1): ?>
                        <th>Solicitante</th>
                    <?php endif; ?>
                    <th>Categoria</th>
                    <th>Urgência</th>
                    <th>Responsável</th>
                    <th>Assunto</th>
                    <th>Data/Hora</th>
                    <th>Andamento</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tickets as $t): ?>
                    <tr>
                        <td>
                            <form method="post" action="<?php echo site_url('editar_andamento'); ?>" id="form_editar_<?php echo $t->id_ticket; ?>">
                                <input type="hidden" name="tick" value="<?php echo $t->id_ticket; ?>">
                            </form>
                        </td>
                        <td><?php echo $t->id_ticket; ?></td>
                        <?php if($this->session->nivel == 0 || $this->session->nivel == 1): ?>
                            <td><?php echo $t->solicitante; ?></td>
                        <?php endif; ?>
                        <td><?php echo $t->id_categoria; ?></td>
                        <td><?php echo $t->urgencia; ?></td>
                        <td><?php echo ucwords($t->responsavel); ?></td>
                        <td><?php echo $t->assunto; ?></td>
                        <td><?php echo date("d/m/Y H:i", strtotime($t->data_inicial)); ?></td>
                        <td><?php echo $this->andamento_model->msgAndamento($t->id_ticket); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="9">
                        <caption>Total de registros retornados: <?php echo count($tickets);?></caption>
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
<?php if($this->session->nivel == 0 || $this->session->nivel == 1): ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('tr').on('click', function(){
                var id = $(this).children().next().html();
                console.log(id);
                $('#form_editar_'+id).submit();
            });
        });
    </script>
<?php endif; ?>
<?php $this->load->view('./rodape'); ?>
