<?php $this->load->view('./cabecalho') ?>
<h4 class="card-header">Em Andamento</h4>
<div class="card-body">
    <form class="form" action="<?php echo site_url('andamento/adicionarAndamento'); ?>" method="post">
        <div class="form-group">
            <label for="id_ticket" class="form-control-label">
                Ticket
            </label>
            <?php $tickets = $this->andamento_model->listarTickets(); ?>
            <select name="id_ticket" id="id_ticket" class="form-control" required>
                <option></option>
                <?php foreach($tickets as $t): ?>
                    <option value="<?php echo $t->id_ticket; ?>" <?php echo (isset($tick)&&$t->id_ticket===$tick)?"selected":""; ?>><?php echo $t->id_ticket; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="mensagem" class="form-control-label">
                Mensagem
            </label>
            <textarea id="mensagem" name="and_mensagem" class="form-control <?php echo form_error('and_mensagem')?"is-invalid":""?>"><?php echo form_error('and_mensagem')?set_value('and_mensagem'):''; ?></textarea>
            <?php echo form_error('and_mensagem');?>
        </div>
        <div class="form-group">
            <label for="data_hora" class="form-control-label">
                Data/Hora
            </label>
            <input type="datetime-local" id="data_hora" class="form-control <?php echo form_error('data_hora')?"is-invalid":""?>" placeholder="01/01/2017 01:00" name="data_hora" value="<?php echo form_error('data_hora')?set_value('data_hora'):''; ?>">
            <?php echo form_error('data_hora');?>
        </div>
        <div class="controls">
            <button class="btn btn-primary" type="submit">Adicionar</button>
            <button class="btn btn-secondary" type="reset">Limpar</button>
        </div>
    </form>
</div>
<div class="card-footer">

</div>
<?php $this->load->view('./rodape') ?>
