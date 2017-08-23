<?php $this->load->view('./cabecalho') ?>
<div class="header">
    <h1>Usuário</h1>
</div>
<div class="cad_usuario">
    <form action="<?php echo site_url('usuario/adicionarUsuario'); ?>" method="post" class="">
        <label>
            Nome:
            <input type="text" name="nome" maxlength="30">
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
        <button type="submit">Adicionar</button>
        <button type="reset">Limpar</button>
    </form>
</div>
  <?php $this->load->view('./rodape') ?>  