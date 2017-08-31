<?php $this->load->view('./cabecalho'); ?>

<div class="header">
    <h1>Alteração de Ticket</h1>
</div>
<div class="buscar_ticket">
    <form action="<?php echo site_url('ticket/buscarTicket');?>" method="post">
        <label>
            Ticket:
            <input type="search" name="buscar" results="">
        </label>
        <button type="submit">Buscar</button>
    </form>
</div>
<?php $this->load->view('./rodape'); ?>