<?php $this->load->view('./cabecalho'); ?>

<h4 class="card-header">Alteração de Andamento</h4>
<div class="card-body">
    <?php if($andamentos): ?>
    <form action="<?php echo site_url('andamento/alterarAndamento'); ?>" method="post">
        <?php foreach ($andamentos as $a): ?>
        <div class="form-group">
            <label for="ticket" class="form-control-label">
                Ticket
            </label>
            <input type="text" class="form-control-plaintext bg-light text-info" id="ticket" readonly name="id_ticket" value="<?php echo $a->id_ticket; ?>">
        </div>
        <div class="form-group">
            <label for="mensagem" class="form-control-label">
                Mensagem
            </label>
            <textarea id="mensagem" name="mensagem" class="form-control"><?php echo $a->mensagem; ?></textarea>
        </div>
        <div class="form-group">
            <label for="data_hora" class="form-control-label">
                Data/Hora
            </label>
            <input type="datetime-local" class="form-control" id="data_hora" name="data_hora" value="<?php echo str_replace(" ", "T", $a->data_hora); ?>">
        </div>
        <?php endforeach; ?>
        <div class="controls">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <button type="reset" class="btn btn-secondary">Cancelar</button>
            <a href="<?php echo site_url('alterar_andamento'); ?>" class="btn btn-light">Voltar</a>
        </div>
    </form>
   <?php else: ?>
        <p>Nenhum dado encontrado para o ticket buscado!</p>
        <a href="<?php echo site_url('alterar_andamento'); ?>">Clique aqui para voltar a busca</a>
   <?php endif; ?>
</div>
<div class="card-footer">
    
</div>
<?php $this->load->view('./rodape'); ?>