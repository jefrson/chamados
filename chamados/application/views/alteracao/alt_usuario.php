<?php $this->load->view('./cabecalho'); ?>

<div class="header">
    <h1>Alteração de Usuário</h1>
</div>
<div class="buscar" hidden="hidden">
    <form action="<?php echo site_url('usuario/buscarUsuario'); ?>" method="post">
        <label>
            Buscar por Usuário:
            <input type="text" name="nome">
        </label>
        <button type="submit">Buscar</button>
    </form>
</div>
<div class="alt_usuario">
    <form action="<?php echo site_url('usuario/alterarUsuario'); ?>" method="post" class="">
        <?php $id = $this->session->id_usuario;
              $users = $this->usuario_model->selecionar($id);
        ?>
        <?php foreach ($users as $us ): ?>        
        <label>
            Nome:
            <input type="text" name="nome" maxlength="30" value="<?php echo $us->nome; ?>">
        </label>
        <br>
        <label>
            Setor:
            <input type="text" name="id_setor" value="<?php echo $us->id_setor; ?>">
        </label>
        <br>
        <label>
            Cargo:
            <input type="text" name="id_cargo" value="<?php echo $us->id_cargo; ?>">
        </label>
        <br>
        <label>
            Secretaria:
            <input type="text" name="id_secretaria" value="<?php echo $us->id_secretaria; ?>">
        </label>
        <br>
        <label>
            Matricula:
            <input type="text" name="matricula" value="<?php echo $us->matricula; ?>">
        </label>
        <br>
        <label>
            CPF:
            <input type="text" name="cpf" maxlength="14" value="<?php echo $us->cpf; ?>">
        </label>
        <br>
        <label>
            E-mail:
            <input type="email" name="email" value="<?php echo $us->email; ?>">
        </label>
        <br>
        <label>
            Usuário:
            <?php 
                if($us->nivel == 1){
                    echo "<input type='checkbox' name='nivel' checked='checked'>";
                }else{
                    echo "<input type='checkbox' name='nivel'>";
                }
            ?>
        </label>
        <?php endforeach; ?>
        <button type="submit">Salvar</button>
        <button type="reset" class="">Cancelar</button>
    </form>
</div>

<?php $this->load->view('./rodape'); ?>