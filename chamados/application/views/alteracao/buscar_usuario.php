<?php $this->load->view('./cabecalho'); ?>
<h4 class="card-header">Buscar por</h4>
<div class="card-body">
    <form action="<?php echo site_url('buscar_usuario'); ?>" method="post">
        <div class="form-group">
            <label for="nome" class="form-control-label">
                Nome do usuário
            </label>
            <input type="text" class="form-control" id="nome" name="nome">
        </div>
        <div class="controls">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>
</div>
<div class="card-footer">
    
</div>
<?php $this->load->view('./rodape'); ?>