<?php $this->load->view('./cabecalho') ?>
<div class="header">
    <h1>Usuário</h1>
</div>
<div class="cad_usuario">
    <form action="<?php echo site_url('usuario/adicionarUsuario'); ?>" method="post" class="">
        <label>
            Nome:
            <input type="text" name="nome" maxlength="30" value="<?php echo form_error('nome')?set_value('nome'):""; ?>"><?php echo form_error('nome'); ?>
        </label>
        <br>
        <label>
            Setor:
            <input type="text" name="id_setor" value="<?php echo form_error('id_setor')?set_value('id_setor'):""; ?>"><?php echo form_error('id_setor'); ?>
        </label>
        <br>
        <label>
            Cargo:
            <input type="text" name="id_cargo" value="<?php echo form_error('id_cargo')?set_value('id_cargo'):""; ?>"><?php echo form_error('id_cargo'); ?>
        </label>
        <br>
        <label>
            Secretaria:
            <input type="text" name="id_secretaria" value="<?php echo form_error('id_secretaria')?set_value('id_secretaria'):""; ?>"><?php echo form_error('id_secretaria'); ?>
        </label>
        <br>
        <label>
            Matricula:
            <input type="text" name="matricula" value="<?php echo form_error('matricula')?set_value('matricula'):""; ?>"><?php echo form_error('matricula'); ?>
        </label>
        <br>
        <label>
            CPF:
            <input type="text" name="cpf" maxlength="14" value="<?php echo form_error('cpf')?set_value('cpf'):""; ?>"><?php echo form_error('cpf'); ?>
        </label>
        <br>
        <label>
            E-mail:
            <input type="email" name="email" value="<?php echo form_error('email')?set_value('email'):""; ?>"><?php echo form_error('email'); ?>
        </label>
        <br>
        <label>
            Usuário:
            <input type="checkbox" checked="checked" name="nivel">
        </label>
        <button type="submit">Adicionar</button>
        <button type="reset">Limpar</button>
    </form>
</div>
  <?php $this->load->view('./rodape') ?>  