<?php $this->load->view('./cabecalho') ?>
<div class="row">
    <div class="col-6">
        <div class="header">
            <h1>Usuário</h1>
        </div>
        <div class="cad_usuario">
            <form class="form" action="<?php echo site_url('usuario/adicionarUsuario'); ?>" method="post" class="">
                <div class="form-group">
                    <label for="nome">
                        Nome
                    </label>
                    <input class="form-control" id="nome" type="text" placeholder="Seu nome aqui" name="nome" maxlength="30" value="<?php echo form_error('nome')?set_value('nome'):""; ?>">
                    <?php echo form_error('nome'); ?>
                </div>
                <div class="form-group">
                    <label for="setor">
                        Setor
                    </label>
                    <input class="form-control" id="setor" min="1" type="number" placeholder="Número do setor" name="id_setor" value="<?php echo form_error('id_setor')?set_value('id_setor'):""; ?>">
                    <?php echo form_error('id_setor'); ?>
                </div>
                <div class="form-group">
                    <label for="cargo">
                        Cargo
                    </label>
                    <input class="form-control" id="cargo" min="1" type="number" placeholder="Número do cargo" name="id_cargo" value="<?php echo form_error('id_cargo')?set_value('id_cargo'):""; ?>">
                    <?php echo form_error('id_cargo'); ?>
                </div>
                <div class="form-group">
                    <label for="secretaria">
                        Secretaria
                    </label>
                    <input class="form-control" id="secretaria" min="1" type="number" placeholder="Número da secretaria" name="id_secretaria" value="<?php echo form_error('id_secretaria')?set_value('id_secretaria'):""; ?>">
                    <?php echo form_error('id_secretaria'); ?>
                </div>
                <div class="form-group">
                    <label>
                        Matricula
                    </label>
                    <input class="form-control" type="number" min="1" placeholder="Número da matrícula" name="matricula" value="<?php echo form_error('matricula')?set_value('matricula'):""; ?>">
                    <?php echo form_error('matricula'); ?>
                </div>
                <div class="form-group">
                    <label for="cpf">
                        CPF
                    </label>
                    <input class="form-control" id="cpf" minlength="11" type="text" placeholder="999.999.999-99" name="cpf" maxlength="14" value="<?php echo form_error('cpf')?set_value('cpf'):""; ?>">
                    <?php echo form_error('cpf'); ?>
                </div>
                <div class="form-group">
                    <label for="email">
                        E-mail
                    </label>
                    <input class="form-control" id="email" type="email" placeholder="seunome@dominio.com" name="email" value="<?php echo form_error('email')?set_value('email'):""; ?>">
                    <?php echo form_error('email'); ?>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" checked="checked" name="nivel">
                        Usuário
                    </label>
                </div>
                <div class="controls">
                    <button class="btn btn-primary" type="submit">Adicionar</button>
                    <button class="btn btn-secondary" type="reset">Limpar</button>
                </div>
            </form>
        </div>
    </div>
<?php $this->load->view('./rodape') ?>  