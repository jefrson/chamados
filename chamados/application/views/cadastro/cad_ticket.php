<?php $this->load->view('./cabecalho') ?>
<h4 class="card-header">Ticket</h4>
<div class="card-body">
    <form action="<?php echo site_url('ticket/adicionarTicket'); ?>" method="post">
        <div class="form-row">
            <div class="form-check col-4">
                <label class="form-check-label form-control-label">
                    <input class="form-check-input" type="checkbox" name="ativo" checked="checked">
                    Ativo
                </label>
            </div>
            <div class="form-group col-6 ml-auto">
                <label for="solicitante" class="form-control-label">
                    Solicitante
                </label>
                <input class="form-control-plaintext text-info bg-light" id="solicitante" type="text" name="solicitante" readonly value="<?php echo $this->session->nome; ?>">
            </div>
        </div>
        <div class="form-row justify-content-center">
            <div class="form-group col-6">
                <label for="id_categoria" class="form-control-label">
                    Categoria
                </label>
                <select id="id_categoria" name="id_categoria" class="form-control" required>
                    <option></option>
                    <option value="1">Categoria 1</option>
                    <option value="2">Categoria 2</option>
                    <option value="3">Categoria 3</option>
                    <option value="4">Categoria 4</option>
                </select>
            </div>
            <div class="form-group col">
                <label for="urgencia" class="form-control-label">
                    Urgência
                </label>
                <select id="urgencia" class="form-control" name="urgencia" required>
                    <option></option>
                    <option value="baixa">Baixa</option>
                    <option value="media">Média</option>
                    <option value="alta">Alta</option>
                    <option value="urgente">Urgente</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="responsavel" class="form-control-label">
                Responsável
            </label>
            <input type="text" id="responsavel" class="form-control <?php echo form_error('responsavel')?"is-invalid":""?>" placeholder="" name="responsavel" value="<?php echo form_error('responsavel')?set_value('responsavel'):''; ?>">
            <?php echo form_error('responsavel'); ?>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for='dt_inicial' class="form-control-label">
                    Data Inicial
                </label>
                <input type="datetime-local" id="dt_inicial" class="form-control <?php echo form_error('data_inicial')?"is-invalid":""?>" placeholder="01/01/2017 01:00" name="data_inicial"value="<?php echo form_error('data_inicial')?set_value('data_inicial'):''; ?>">
                <?php echo form_error('data_inicial'); ?>
            </div>
            <div class="form-group col">
                <label for="dt_final" class="form-control-label">
                    Data Final
                </label>
                <input type="datetime-local" id="dt_final" class="form-control <?php echo form_error('data_final')?"is-invalid":""?>" placeholder="01/01/2017 01:00" name="data_final" value="<?php echo form_error('data_final')?set_value('data_final'):''; ?>">
                <?php echo form_error('data_final'); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="assunto" class="form-control-label">
                Assunto
            </label>
            <textarea class="form-control <?php echo form_error('assunto')?"is-invalid":""?>" id="assunto" name="assunto" rows="1"><?php echo form_error('assunto')?set_value('assunto'):''; ?></textarea>
            <?php echo form_error('assunto'); ?>
        </div>
        <div class="form-group">
            <label for="mensagem" class="form-control-label">
                Mensagem
            </label>
            <textarea class="form-control <?php echo form_error('mensagem')?"is-invalid":""?>" id="mensagem" name="mensagem"><?php echo form_error('mensagem')?set_value('mensagem'):''; ?></textarea>
            <?php echo form_error('mensagem'); ?>
        </div>
        <div class="form-group">
            <label class="custom-file">
                <input class="custom-file-input" id="anexo" type="file" name="anexo">
                <span class="custom-file-control">Clique para inserir um Anexo</span>
            </label>
        </div>
        <div class="controls">
            <button class="btn btn-primary" type="submit">Adicionar</button>
            <button class="btn btn-secondary" type="reset">Limpar</button>
        </div>
    </form>
</div>
<?php $this->load->view('./rodape') ?>