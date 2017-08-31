<?php $this->load->view('./cabecalho') ?>
<div class="row align-self-center justify-content-center">
    <div class="col-8">
        <div class="card card-default">
            <div class="card-header">
                <h1 class="card-title">Ticket</h1>
            </div>
            <div class="cad_ticket">
                <form class="form" action="<?php echo site_url('ticket/adicionarTicket'); ?>" method="post">
                    <div class="form-check">
                        <label class="form-check-label form-control-label">
                            <input class="form-check-input" type="checkbox" name="ativo">
                            Ativo
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="solicitante" class="form-control-label">
                            Solicitante
                        </label>
                        <input class="form-control-plaintext" id="solicitante" type="text" name="solicitante" readonly value="<?php echo $this->session->nome; ?>">
                    </div>
                    <div class="form-group">
                        <label for="id_categoria" class="form-control-label">
                            Categoria
                        </label>
                        <select id="id_categoria" name="id_categoria" class="form-control">
                            <option value="0"></option>
                            <option value="1">Categoria 1</option>
                            <option value="2">Categoria 2</option>
                            <option value="3">Categoria 3</option>
                            <option value="4">Categoria 4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="urgencia" class="form-control-label">
                            Urgência
                        </label>
                        <select id="urgencia" class="form-control" name="urgencia" multiple>
                            <option value="0"></option>
                            <option value="baixa">Baixa</option>
                            <option value="media">Média</option>
                            <option value="alta">Alta</option>
                            <option value="urgente">Urgente</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="responsavel" class="form-control-label">
                            Responsável
                        </label>
                        <input type="text" id="responsavel" class="form-control" placeholder="" name="responsavel" value="<?php echo form_error('responsavel')?set_value('responsavel'):''; ?>">
                        <?php echo form_error('responsavel'); ?>
                    </div>
                    <div class="form-group">
                        <label for='dt_inicial' class="form-control-label">
                            Data Inicial
                        </label>
                        <input type="datetime-local" id="dt_inicial" class="form-control" placeholder="01/01/2017 01:00" name="data_inicial">
                    </div>
                    <div class="form-group">
                        <label for="dt_final" class="form-control-label">
                            Data Final
                        </label>
                        <input type="datetime-local" id="dt_final" class="form-control" placeholder="01/01/2017 01:00" name="data_final">
                    </div>
                    <div class="form-group">
                        <label for="assunto" class="form-control-label">
                            Assunto
                        </label>
                        <textarea class="form-control" id="assunto" name="assunto" rows="1">
                            <?php echo form_error('assunto')?set_value('assunto'):''; ?>
                        </textarea>
                        <?php echo form_error('assunto'); ?>
                    </div>
                    <div class="form-group">
                        <label for="mensagem" class="form-control-label">
                            Mensagem
                        </label>
                        <textarea class="form-control" id="mensagem" name="mensagem">
                            <?php echo form_error('mensagem')?set_value('mensagem'):''; ?>
                        </textarea>
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
        </div>
    </div>
<?php $this->load->view('./rodape') ?>