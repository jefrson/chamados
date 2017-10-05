<?php $this->load->view('./cabecalho'); ?>

<div class="modal fade" id="sucesso" tabindex="-1" role="dialog" aria-labelledby="sucesso" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sucesso!</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Cadastro concluído com sucesso!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#sucesso').modal('show');
    $('#sucesso').on('hidden.bs.modal', function(){
        $(location).attr('href', "<?php echo site_url($pagina); ?>");
    });
</script>
