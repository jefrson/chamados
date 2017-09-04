<?php $this->load->view('./cabecalho'); ?>
<h4 class="card-header">Ateração de Ticket</h4>
<div class="card-body">
   <?php if($tickets): ?>
        <form action="<?php echo site_url('ticket/alterarTicket'); ?>" method="post">
            <?php foreach ($tickets as $t): ?>
            <div class="form-row">
                <div class="form-group col">
                    <label for="ticket" class="form-control-label">
                        Ticket
                    </label>
                    <input type="text" class="form-control-plaintext bg-light text-info" id="ticket" readonly name="id_ticket" value="<?php echo $t->id_ticket; ?>">
                </div>
                <div class="form-group col">
                    <label for="solicitante" class="form-control-label">
                        Solicitante
                    </label>
                    <input type="text" class="form-control-plaintext bg-light text-info" id="solicitante" name="solicitante" readonly value="<?php echo $this->session->nome; ?>">
                </div>
                <div class="form-check col">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="ativo" <?php echo $t->ativo?"checked='checked'":""; ?>>
                        Ativo
                    </label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="categoria" class="form-control-label">
                        Categoria
                    </label>
                    <select name="id_categoria" id="categoria" class="form-control">
                        <option value="0"></option>
                        <option value="1" <?php echo $t->id_categoria==1?"selected":""; ?>>Categoria 1</option>
                        <option value="2" <?php echo $t->id_categoria==2?"selected":""; ?>>Categoria 2</option>
                        <option value="3" <?php echo $t->id_categoria==3?"selected":""; ?>>Categoria 3</option>
                        <option value="4" <?php echo $t->id_categoria==4?"selected":""; ?>>Categoria 4</option>
                    </select>
                </div>
                <div class="form-group col">
                    <label for="urgencia" class="form-control-label">
                        Urgência
                    </label>
                    <select name="urgencia" id="urgencia" class="form-control">
                        <option value="0"></option>
                        <option value="baixa" <?php echo $t->urgencia=="baixa"?"selected":""; ?>>Baixa</option>
                        <option value="media" <?php echo $t->urgencia=="media"?"selected":""; ?>>Média</option>
                        <option value="alta" <?php echo $t->urgencia=="alta"?"selected":""; ?>>Alta</option>
                        <option value="urgente" <?php echo $t->urgencia=="urgente"?"selected":""; ?>>Urgente</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="responsavel" class="form-control-label">
                    Responsável
                </label>
                <input type="text" class="form-control" id="responsavel" name="responsavel" value="<?php echo $t->responsavel; ?>"><?php echo form_error('responsavel'); ?>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="dt_ini" class="form-control-label">
                        Data Inicial
                    </label>
                    <input type="datetime-local" class="form-control" id="dt_ini" name="data_inicial" value="<?php echo str_replace(" ", "T", $t->data_inicial); ?>">
                </div>
                <div class="form-group col">
                    <label for="dt_fin" class="form-control-label"> 
                        Data Final
                    </label>
                    <input type="datetime-local" class="form-control" id="dt_fin" name="data_final" value="<?php echo str_replace(" ", "T", $t->data_final); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="assunto" class="form-control-label">
                    Assunto
                </label>
                <textarea name="assunto" class="form-control" id="assunto" rows="1"><?php echo $t->assunto; ?></textarea><?php echo form_error('assunto'); ?>
            </div>
            <div class="form-group">
                <label for="mensagem" class="form-control-label">
                 Mensagem
                </label>
                <textarea class="form-control" id="mensagem" name="mensagem"><?php echo $t->mensagem; ?></textarea><?php echo form_error('mensagem'); ?>
            </div>
            <div class="form-group">
                <label class="custom-file">
                    <span class="custom-file-control">Clique para inserir um Anexo</span>
                    <input type="file" class="custom-file-input" name="anexo" value="<?php echo $t->anexo; ?>">
                </label>
            </div>
            <?php endforeach; ?>
            <div class="controls">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <button type="reset" class="btn btn-secondary">Cancelar</button>
                <a href="<?php echo site_url('alterar_ticket'); ?>" class="btn btn-light">Voltar</a>
            </div>
         </form>
    <?php else: ?>
        <p>Nenhum dado encontrado para o ticket buscado!</p>
        <a href="<?php echo site_url('alterar_ticket'); ?>">Clique aqui para voltar a busca</a>
    <?php endif; ?>
</div>
<?php $this->load->view('./rodape'); ?>