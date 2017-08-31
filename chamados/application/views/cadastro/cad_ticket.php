<?php $this->load->view('./cabecalho') ?>
<div class="header">
    <h1>Ticket</h1>
</div>
<div class="cad_ticket">
    <form action="<?php echo site_url('ticket/adicionarTicket'); ?>" method="post">
        <label>
            Ativo:
            <input type="checkbox" name="ativo">
        </label>
        <br>
        <label>
            Solicitante:
            <input type="text" name="solicitante" disabled="disabled" value="<?php echo $this->session->nome; ?>">
            
            <!--Esta parte exibe um Combobox de usuários
            <?php //$this->load->model('ticket_model'); ?>
            <?php //$ids = $this->ticket_model->listarUsuarios(); ?>
            <select name="solicitante">
                <option value="0"></option>
                <?php //foreach($ids as $id): ?>
                    <option value="<?php //echo $id->id_usuario; ?>"><?php //echo $id->nome; ?></option>
                <?php //endforeach; ?>
            </select>
            -->
        </label>
        <br>
        <label>
            Categoria:
            <select name="id_categoria">
                <option value="0"></option>
                <option value="1">Categoria 1</option>
                <option value="2">Categoria 2</option>
                <option value="3">Categoria 3</option>
                <option value="4">Categoria 4</option>
            </select>
        </label>
        <br>
        <label>
            Urgência:
            <select name="urgencia">
                <option value="0"></option>
                <option value="baixa">Baixa</option>
                <option value="media">Média</option>
                <option value="alta">Alta</option>
                <option value="urgente">Urgente</option>
            </select>
        </label>
        <br>
        <label>
            Responsável:
            <input type="text" name="responsavel" value="<?php echo form_error('responsavel')?set_value('responsavel'):''; ?>"><?php echo form_error('responsavel'); ?>
        </label>
        <br>
        <label>
            Data Inicial:
            <input type="datetime-local" name="data_inicial">
        </label>
        <br>
        <label>
            Data Final:
            <input type="datetime-local" name="data_final">
        </label>
        <br>
        <label>
            Assunto:
            <textarea name="assunto" rows="1"><?php echo form_error('assunto')?set_value('assunto'):''; ?></textarea><?php echo form_error('assunto'); ?>
        </label>
        <br>
        <label>
            Mensagem:
            <textarea name="mensagem"><?php echo form_error('mensagem')?set_value('mensagem'):''; ?></textarea><?php echo form_error('mensagem'); ?>
        </label>
        <br>
        <label>
            Anexo:
            <input type="file" name="anexo" accept="pdf">
        </label>
        <br>
        <button type="submit">Adicionar</button>
        <button type="reset">Limpar</button>
    </form>
</div>
<?php $this->load->view('./rodape') ?>