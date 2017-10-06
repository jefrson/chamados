<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-08-30 13:57:31 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): Nenhuma conex�o p�de ser feita porque a m�quina de destino as recusou ativamente.
 C:\xampp\htdocs\chamados\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2017-08-30 13:57:31 --> Unable to connect to the database
ERROR - 2017-08-30 14:17:11 --> Query error: Duplicate entry 'jeferson' for key 'nome' - Invalid query: UPDATE `usuario` SET `id_usuario` = '1', `nome` = 'jeferson', `id_setor` = '1', `id_cargo` = '1', `id_secretaria` = '2', `matricula` = '1', `cpf` = '1', `email` = 'jeff@jeff.jeff', `nivel` = 1, `senha` = 'c4ca4238a0b923820dcc509a6f75849b'
WHERE `id_usuario` = '1'
ERROR - 2017-08-30 14:18:36 --> Query error: Duplicate entry 'jeferson' for key 'nome' - Invalid query: UPDATE `usuario` SET `id_usuario` = '1', `nome` = 'jeferson', `id_setor` = '1', `id_cargo` = '1', `id_secretaria` = '2', `matricula` = '1', `cpf` = '1', `email` = 'jeff@jeff.jeff', `nivel` = 1, `senha` = 'c4ca4238a0b923820dcc509a6f75849b'
WHERE `id_usuario` = '1'
ERROR - 2017-08-30 14:21:22 --> Query error: Cannot delete or update a parent row: a foreign key constraint fails (`chamado`.`ticket`, CONSTRAINT `id_fk_solicitante` FOREIGN KEY (`solicitante`) REFERENCES `usuario` (`id_usuario`)) - Invalid query: REPLACE INTO `usuario` (`id_usuario`, `nome`, `id_setor`, `id_cargo`, `id_secretaria`, `matricula`, `cpf`, `email`, `nivel`, `senha`) VALUES ('1', 'jeferson', '1', '1', '2', '1', '1', 'jeff@jeff.jeff', 1, 'c4ca4238a0b923820dcc509a6f75849b')
ERROR - 2017-08-30 14:23:36 --> Query error: Duplicate entry '1' for key 'matricula' - Invalid query: UPDATE `usuario` SET `id_usuario` = '1', `nome` = 'jeff', `id_setor` = '1', `id_cargo` = '1', `id_secretaria` = '1', `matricula` = '1', `cpf` = '1', `email` = 'jeff@jeff.jeff', `nivel` = 1, `senha` = 'c4ca4238a0b923820dcc509a6f75849b'
WHERE `id_usuario` = '1'
ERROR - 2017-08-30 14:34:25 --> Query error: Duplicate entry 'jeferson' for key 'nome' - Invalid query: UPDATE `usuario` SET `id_usuario` = '1', `nome` = 'jeferson', `id_setor` = '1', `id_cargo` = '1', `id_secretaria` = '1', `matricula` = '1', `cpf` = '1', `email` = 'jeff@jeff.jeff', `nivel` = 1, `senha` = 'c4ca4238a0b923820dcc509a6f75849b'
WHERE `id_usuario` = '1'
ERROR - 2017-08-30 14:37:27 --> Severity: Notice --> Undefined index: id_usuario C:\xampp\htdocs\chamados\application\models\usuario_model.php 17
ERROR - 2017-08-30 15:27:35 --> 404 Page Not Found: Andamento/index
ERROR - 2017-08-30 15:31:39 --> Could not find the language line "form_validation_validar_cpf"
ERROR - 2017-08-30 15:31:39 --> Severity: Notice --> Undefined variable: adc C:\xampp\htdocs\chamados\application\controllers\usuario.php 40
ERROR - 2017-08-30 15:33:13 --> Could not find the language line "form_validation_validar_cpf"
ERROR - 2017-08-30 15:33:13 --> Severity: Notice --> Undefined variable: adc C:\xampp\htdocs\chamados\application\controllers\usuario.php 40
ERROR - 2017-08-30 15:42:28 --> Could not find the language line "form_validation_validar_cpf"
ERROR - 2017-08-30 15:42:28 --> Severity: Notice --> Undefined variable: adc C:\xampp\htdocs\chamados\application\controllers\usuario.php 40
ERROR - 2017-08-30 15:43:03 --> Severity: error --> Exception: Call to undefined function ereg_replace() C:\xampp\htdocs\chamados\application\controllers\usuario.php 120
ERROR - 2017-08-30 15:43:31 --> Severity: error --> Exception: Call to undefined function ereg_replace() C:\xampp\htdocs\chamados\application\controllers\usuario.php 120
ERROR - 2017-08-30 15:44:25 --> Severity: error --> Exception: Call to undefined function ereg_replace() C:\xampp\htdocs\chamados\application\controllers\usuario.php 120
ERROR - 2017-08-30 15:49:29 --> Severity: error --> Exception: Call to undefined function ereg_replace() C:\xampp\htdocs\chamados\application\controllers\usuario.php 120
ERROR - 2017-08-30 15:56:18 --> Severity: error --> Exception: Call to undefined function ereg_replace() C:\xampp\htdocs\chamados\application\controllers\usuario.php 121
ERROR - 2017-08-30 15:56:24 --> Severity: error --> Exception: Call to undefined function ereg_replace() C:\xampp\htdocs\chamados\application\controllers\usuario.php 121
ERROR - 2017-08-30 15:56:40 --> Severity: error --> Exception: Call to undefined function ereg_replace() C:\xampp\htdocs\chamados\application\controllers\usuario.php 121
ERROR - 2017-08-30 15:57:08 --> Severity: error --> Exception: Call to undefined method Usuario::ereg_replace() C:\xampp\htdocs\chamados\application\controllers\usuario.php 121
ERROR - 2017-08-30 15:57:49 --> Query error: Duplicate entry '0' for key 'cpf' - Invalid query: INSERT INTO `usuario` (`nome`, `id_setor`, `id_cargo`, `id_secretaria`, `matricula`, `email`, `cpf`, `senha`, `nivel`) VALUES ('dfgfdgdf', '8', '8', '8', '8', 'fdfsf@sfdsf.csa', 'a', 'c9f0f895fb98ab9159f51fd0297e236d', 1)
ERROR - 2017-08-30 16:00:18 --> Query error: Duplicate entry '0' for key 'cpf' - Invalid query: INSERT INTO `usuario` (`nome`, `id_setor`, `id_cargo`, `id_secretaria`, `matricula`, `email`, `cpf`, `senha`, `nivel`) VALUES ('erwrwr', '9', '9', '9', '9', 'sdjfh@jsdg.saghd', 'a', '0cc175b9c0f1b6a831c399e269772661', 1)
ERROR - 2017-08-30 16:01:07 --> Severity: Notice --> Undefined variable: adc C:\xampp\htdocs\chamados\application\controllers\usuario.php 43
ERROR - 2017-08-30 16:09:56 --> Could not find the language line "form_validation_validar_cpf"
ERROR - 2017-08-30 16:11:15 --> Could not find the language line "form_validation_validar_cpf"
ERROR - 2017-08-30 16:13:32 --> Could not find the language line "form_validation_validar_cpf"
ERROR - 2017-08-30 16:13:34 --> Could not find the language line "form_validation_validar_cpf"
ERROR - 2017-08-30 16:13:42 --> Could not find the language line "form_validation_validar_cpf"
ERROR - 2017-08-30 16:16:09 --> Could not find the language line "form_validation_validar_cpf"
ERROR - 2017-08-30 16:16:54 --> Could not find the language line "form_validation_validar_cpf"
ERROR - 2017-08-30 19:38:52 --> 404 Page Not Found: Cadastro/cad_ticket
