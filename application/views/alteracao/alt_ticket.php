<?php $this->load->view('./cabecalho'); ?>

<h4 class="card-header">Buscar Ticket</h4>
<div class="card-body">
    <form action="<?php echo site_url('buscar_ticket');?>" method="post">
        <div class="form-group">
            <label for="ticket" class="form-control-label">
                Ticket
            </label>
            <input type="search" class="form-control" id="ticket" name="buscar" results="">
        </div>
        <div class="controls">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>
</div>
<div class="card-footer">
    
</div>
<?php $this->load->view('./rodape'); ?>