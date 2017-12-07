<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-09-11 14:28:24 --> Severity: error --> Exception: Call to undefined method CI_DB_mysqli_driver::num_rows() C:\xampp\htdocs\chamados\application\models\ticket_model.php 39
ERROR - 2017-09-11 14:38:30 --> Severity: Notice --> Undefined variable: ins C:\xampp\htdocs\chamados\application\views\cadastro\cad_ticket.php 95
ERROR - 2017-09-11 14:54:13 --> Severity: error --> Exception: Class 'HTML' not found C:\xampp\htdocs\chamados\application\controllers\ticket.php 41
ERROR - 2017-09-11 15:15:57 --> Severity: error --> Exception: Class 'html_element' not found C:\xampp\htdocs\chamados\application\controllers\ticket.php 41
ERROR - 2017-09-11 15:26:14 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\chamados\application\controllers\ticket.php 130
ERROR - 2017-09-11 15:26:14 --> Severity: Notice --> Undefined index: total C:\xampp\htdocs\chamados\application\controllers\ticket.php 114
ERROR - 2017-09-11 15:26:45 --> Severity: Notice --> Undefined index: total C:\xampp\htdocs\chamados\application\controllers\ticket.php 114
ERROR - 2017-09-11 16:23:03 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\chamados\system\database\DB_query_builder.php 683
ERROR - 2017-09-11 16:23:03 --> Query error: Unknown column 'usuario' in 'where clause' - Invalid query: SELECT *
FROM `ticket`
JOIN `usuario` ON `usuraio`.`id_usuario` = `ticket`.`solicitante`
WHERE `usuario` = `Array`
ERROR - 2017-09-11 16:23:41 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\chamados\system\database\DB_query_builder.php 683
ERROR - 2017-09-11 16:23:41 --> Query error: Unknown column 'usuario' in 'where clause' - Invalid query: SELECT *
FROM `ticket`
JOIN `usuario` ON `usuario`.`id_usuario` = `ticket`.`solicitante`
WHERE `usuario` = `Array`
ERROR - 2017-09-11 16:23:42 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\chamados\system\database\DB_query_builder.php 683
ERROR - 2017-09-11 16:23:42 --> Query error: Unknown column 'usuario' in 'where clause' - Invalid query: SELECT *
FROM `ticket`
JOIN `usuario` ON `usuario`.`id_usuario` = `ticket`.`solicitante`
WHERE `usuario` = `Array`
ERROR - 2017-09-11 16:26:19 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2017-09-11 16:27:04 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2017-09-11 16:27:19 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2017-09-11 16:27:19 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2017-09-11 16:27:20 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2017-09-11 16:27:20 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2017-09-11 16:27:20 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2017-09-11 16:27:30 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2017-09-11 16:27:30 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2017-09-11 16:29:06 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2017-09-11 16:29:06 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2017-09-11 16:29:06 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2017-09-11 16:29:07 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2017-09-11 16:30:47 --> Severity: error --> Exception: Too few arguments to function CI_DB_driver::query(), 0 passed in C:\xampp\htdocs\chamados\application\models\andamento_model.php on line 15 and at least 1 expected C:\xampp\htdocs\chamados\system\database\DB_driver.php 608
ERROR - 2017-09-11 18:12:03 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\chamados\application\views\cadastro\cad_andamento.php 12
ERROR - 2017-09-11 18:12:23 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\chamados\application\views\cadastro\cad_andamento.php 12
ERROR - 2017-09-11 20:58:18 --> Query error: Column 'anexo' cannot be null - Invalid query: INSERT INTO `ticket` (`id_categoria`, `urgencia`, `responsavel`, `mensagem`, `assunto`, `anexo`, `data_inicial`, `data_final`, `solicitante`, `ativo`) VALUES ('2', 'media', 'jhdsadyuad', 'uihsuyasgdfhsfnsadfahsdf8shf7ahs8fsaf', 'dgdfghaiugdshfgdiufghudg', NULL, '2017-09-12T04:01', '2017-09-12T12:00', '4', 1)
ERROR - 2017-09-11 21:03:59 --> Query error: Column 'anexo' cannot be null - Invalid query: INSERT INTO `ticket` (`id_categoria`, `urgencia`, `responsavel`, `mensagem`, `assunto`, `anexo`, `data_inicial`, `data_final`, `solicitante`, `ativo`) VALUES ('1', 'baixa', 'gbdhgdbgdhjb', 'nsudfsdfsudnfsdfuhsfsduhf', 'dhfgdbgbdifug', NULL, '2017-09-01T02:00', '2017-09-11T03:00', '4', 1)
ERROR - 2017-09-11 21:04:25 --> Query error: Column 'anexo' cannot be null - Invalid query: INSERT INTO `ticket` (`id_categoria`, `urgencia`, `responsavel`, `mensagem`, `assunto`, `anexo`, `data_inicial`, `data_final`, `solicitante`, `ativo`) VALUES ('1', 'baixa', 'gbdhgdbgdhjb', 'nsudfsdfsudnfsdfuhsfsduhf', 'dhfgdbgbdifug', NULL, '2017-09-01T02:00', '2017-09-11T03:00', '4', 1)
