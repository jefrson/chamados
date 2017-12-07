<?php $this->load->view('./cabecalho'); ?>

<h4 class="card-header">Listagem de Tickets</h4>
<div class="card-body">
    <div class="row">
        <table class="table table-sm table-hover table-responsive table-bordered">
            <thead class="thead-default">
                <tr>
                    <th></th>
                    <th>Ticket</th>
                    <?php if(!$this->session->nivel): ?>
                        <th>Solicitante</th>
                    <?php endif; ?>
                    <th>Categoria</th>
                    <th>Urgência</th>
                    <th>Responsável</th>
                    <th>Assunto</th>
                    <th>Data/Hora</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tickets as $t): ?>
                    <tr>
                        <td class="controls">
                            <label class="custom-control custom-checkbox">
                                <button class="btn btn-primary btn-sm editar" type="button" name="editar_<?php echo $t->id_ticket; ?>">Editar</button>
                            </label>
                        </td>
                        <td><?php echo $t->id_ticket; ?></td>
                        <?php if($this->session->nivel == FALSE): ?>
                            <td><?php echo $t->solicitante; ?></td>
                        <?php endif; ?>
                        <td><?php echo $t->id_categoria; ?></td>
                        <td><?php echo $t->urgencia; ?></td>
                        <td><?php echo ucfirst($t->responsavel); ?></td>
                        <td><?php echo $t->assunto; ?></td>
                        <td><?php echo date("d/m/Y H:i", strtotime($t->data_inicial)); ?></td>
                        <td><?php echo $t->ativo?"Ativo":"Concluido"; ?></td>
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
<script type="text/javascript">
    $(document).ready(function(){
        $('.editar').on('click', function(){
            var id = $(this).parent().parent().parent().children().next().html();
            console.log(id);
            $.ajax({
                url: "<?php echo site_url('andamento/editarAndamento'); ?>",
                type: 'POST',
                data: {'id_ticket': id},
            }).done(function() {
                console.log("successo");
                $(location).attr('href', '<?php echo site_url('editar_andamento'); ?>');
            }).fail(function() {
                console.log("erro");
            }).always(function() {
                console.log("completo");
            });
        });
    });
</script>
<?php $this->load->view('./rodape'); ?>