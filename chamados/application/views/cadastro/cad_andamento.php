<?php $this->load->view('./cabecalho') ?>
<div class="row">
    <div class="col-6">
        <div class="header">
            <h1>Em Andamento</h1>
        </div>
        <div class="cad_andamento">
            <form class="form" action="<?php echo site_url('andamento/adicionarAndamento'); ?>" method="post">
                <div class="form-group">
                    <label for="id_ticket" class="form-control-label">
                        Ticket
                    </label>
                    <?php $tickets = $this->andamento_model->listarTickets(); ?>
                    <select name="id_ticket" id="id_ticket" class="form-control">
                        <option value="0"></option>
                        <?php foreach($tickets as $t): ?>
                            <option value="<?php echo $t->id_ticket; ?>"><?php echo $t->id_ticket; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="mensagem" class="form-control-label">
                        Mensagem
                    </label>
                    <textarea id="mensagem" name="mensagem" class="form-control">
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="data_hora" class="form-control-label">
                        Data/Hora    
                    </label>
                    <input type="datetime-local" id="data_hora" class="form-control" placeholder="01/01/2017 01:00" name="data_hora">
                </div>
                <div class="controls">
                    <button class="btn btn-primary" type="submit">Adicionar</button>
                    <button class="btn btn-secondary" type="reset">Limpar</button>
                </div>
            </form>
        </div>
    </div>
<?php $this->load->view('./rodape') ?>
