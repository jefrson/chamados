<?php $this->load->view('./cabecalho'); ?>

<div class="header">
    <h1>Alteração de Ticket</h1>
</div>
<div class="alt_ticket">
    <form action="<?php echo site_url('ticket/adicionarTicket'); ?>" method="post">
        <label>
            Ativo:
            <input type="checkbox" name="ativo">
        </label>
        <br>
        <label>
            Solicitante:
            <?php $this->load->model('ticket_model'); ?>
            <?php $ids = $this->ticket_model->listarUsuarios(); ?>
            <select name="solicitante">
                <option value="0"></option>
                <?php foreach($ids as $id): ?>
                    <option value="<?php echo $id->id_usuario; ?>"><?php echo $id->nome; ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <br>
        <label>
            Categoria:
            <select name="id_categoria">
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
                <option name="baixa">Baixa</option>
                <option name="media">Média</option>
                <option name="alta">Alta</option>
                <option name="urgente">Urgente</option>
            </select>
        </label>
        <br>
        <label>
            Responsável:
            <input type="text" name="responsavel">
        </label>
        <br>
        <label>
            Data Inicial:
            <input type="date" name="data_inicial">
        </label>
        <br>
        <label>
            Data Final:
            <input type="date" name="data_final">
        </label>
        <br>
        <label>
            Assunto:
            <textarea name="assunto" rows="1">
            </textarea>
        </label>
        <br>
        <label>
            Mensagem:
            <textarea name="mensagem">
            </textarea>
        </label>
        <br>
        <label>
            Anexo:
            <input type="file" name="anexo">
        </label>
        <br>
        <button type="submit">Alterar</button>
        <button type="reset">Cancelar</button>
    </form>
</div>

<?php $this->load->view('./rodape'); ?>