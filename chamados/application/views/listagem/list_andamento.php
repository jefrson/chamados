<?php $this->load->view('./cabecalho'); ?>

<div class="header">
    <h1>Listagem de Andamentos</h1>
</div>
<div class="list_andamento">
    <table>
        <thead>
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
                    <td><?php echo $and->ticket; ?></td>
                    <td><?php echo $and->mensagem; ?></td>
                    <td><?php echo $and->data_hora; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php $this->load->view('./rodape'); ?>