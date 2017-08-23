<?php $this->load->view('./cabecalho'); ?>

<div class="header">
    <h1>Alteração de Usuário</h1>
</div>
<div class="alt_usuario">
    <form action="<?php echo site_url('usuario/alterarUsuario'); ?>" method="post" class="">
        <label>
            Nome:
            <input type="text" name="nome" maxlength="30" value="">
        </label>
        <br>
        <label>
            Setor:
            <input type="text" name="id_setor">
        </label>
        <br>
        <label>
            Cargo:
            <input type="text" name="id_cargo">
        </label>
        <br>
        <label>
            Secretaria:
            <input type="text" name="id_secretaria">
        </label>
        <br>
        <label>
            Matricula:
            <input type="text" name="matricula">
        </label>
        <br>
        <label>
            CPF:
            <input type="text" name="cpf" maxlength="14">
        </label>
        <br>
        <label>
            E-mail:
            <input type="email" name="email">
        </label>
        <br>
        <button type="submit">Salvar</button>
        <button type="reset" class="">Cancelar</button>
    </form>
</div>

<?php $this->load->view('./rodape'); ?>
