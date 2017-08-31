<?php $this->load->view('./cabecalho'); ?>
<div class="col-12">
    <div class="header">
        <h1>Listagem de Andamentos</h1>
    </div>
    <div class="list_andamento">
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
                <?php $andamentos = $this->andamento_model->listar(); ?>
                <?php foreach ($andamentos as $and): ?>
                    <tr>
                        <td><?php echo $and->id_andamento; ?></td>
                        <td><?php echo $and->id_ticket; ?></td>
                        <td><?php echo $and->mensagem; ?></td>
                        <td><?php echo $and->data_hora; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('./rodape'); ?>