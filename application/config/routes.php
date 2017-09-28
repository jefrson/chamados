<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['cadastro_ticket'] = 'ticket/adicionarTicket';
$route['cadastro_tickets'] = 'ticket/adicionarTicket';
$route['cadastro_usuario'] = 'usuario/adicionarUsuario';
$route['cadastro_usuarios'] = 'usuario/adicionarUsuario';
$route['cadastro_andamento'] = 'andamento/adicionarAndamento';
$route['cadastro_andamentos'] = 'andamento/adicionarAndamento';
$route['listar_tickets'] = 'ticket/listarTicket';
$route['listar_ticket'] = 'ticket/listarTicket';
$route['listar_usuarios'] = 'usuario/listarUsuario';
$route['listar_usuario'] = 'usuario/listarUsuario';
$route['listar_andamento'] = 'andamento/listarAndamento';
$route['listar_andamentos'] = 'andamento/listarAndamento';
$route['buscar_usuario'] = 'usuario/buscarUsuario';
$route['buscar_usuarios'] = 'usuario/buscarUsuario';
$route['buscar_andamento'] = 'andamento/buscarAndamento';
$route['buscar_andamentos'] = 'andamento/buscarAndamento';
$route['buscar_ticket'] = 'ticket/buscarTicket';
$route['buscar_tickets'] = 'ticket/buscarTicket';
$route['alterar_ticket'] = 'ticket/alterarTicket';
$route['alterar_tickets'] = 'ticket/alterarTicket';
$route['alterar_andamento'] = 'andamento/alterarAndamento';
$route['alterar_andamentos'] = 'andamento/alterarAndamento';
$route['alterar_usuario'] = 'usuario/alterarUsuario';
$route['alterar_usuarios'] = 'usuario/alterarUsuarios';
$route['login'] = 'login/index';
$route['verificar_login'] = 'login/verificarLogin';
$route['sair'] = 'login/logOut';
$route['listar_usuarios/(:num)'] = 'usuario/listarUsuario';
$route['listar_tickets/(:num)'] = 'ticket/listarTicket';
$route['listar_andamentos/(:num)'] = 'andamento/listarAndamento';
$route['default_controller'] = 'Welcome';
$route['404_override'] = 'errors/html/error_404';
$route['translate_uri_dashes'] = FALSE;


