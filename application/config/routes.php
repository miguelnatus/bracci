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

$route['^(pt|en|it)'] = 'home/index';

$route['^(pt|en|it)/teste'] = 'teste/index';
$route['^(pt|en|it)/teste/remove_cache'] = 'teste/remove_cache';

$route['^(pt|en|it)/search'] = 'search/index';
$route['^(pt|en|it)/cache'] = 'cache/index';
$route['^(pt|en|it)/import'] = 'import/index';

$route['^(pt|en|it)/produtos'] = 'produtos/index';

$route['^(pt|en|it)/empresa'] = 'empresa/index';
$route['^(pt|en|it)/company'] = 'empresa/index';
$route['^(pt|en|it)/affari'] = 'empresa/index';

$route['^(pt|en|it)/qualidade'] = 'qualidade/index';
$route['^(pt|en|it)/quality'] = 'qualidade/index';
$route['^(pt|en|it)/qualita'] = 'qualidade/index';

$route['^(pt|en|it)/sustentabilidade'] = 'sustentabilidade/index';
$route['^(pt|en|it)/sustainability'] = 'sustentabilidade/index';
$route['^(pt|en|it)/sostenibilita'] = 'sustentabilidade/index';

$route['^(pt|en|it)/onde-comprar'] = 'OndeComprar/index';

$route['^(pt|en|it)/contato'] = 'contato/index';
$route['^(pt|en|it)/contattaci'] = 'contato/index';
$route['^(pt|en|it)/contact'] = 'contato/index';

$route['^(pt|en|it)/projetos-com-bracci'] = 'projetos/index';
$route['^(pt|en|it)/projects-with-bracci'] = 'projetos/index';
$route['^(pt|en|it)/projetos'] = 'projetos/index';


$route['^(pt|en|it)/acabamentos/(:any)'] = 'categoria/index/$1';
$route['^(pt|en|it)/finishings/(:any)'] = 'categoria/index/$1';
$route['^(pt|en|it)/finitures/(:any)'] = 'categoria/index/$1';

$route['^(pt|en|it)/ambientes/(:any)'] = 'ambientes/index/$1';
$route['^(pt|en|it)/ambient/(:any)'] = 'ambientes/index/$1';
$route['^(pt|en|it)/ambienti/(:any)'] = 'ambientes/index/$1';

$route['^(pt|en|it)/linhas/(:any)'] = 'linhas/index/$1';
$route['^(pt|en|it)/lines/(:any)'] = 'linhas/index/$1';
$route['^(pt|en|it)/linee/(:any)'] = 'linhas/index/$1';

$route['^(pt|en|it)/acessorios'] = 'acessorios/index';
$route['^(pt|en|it)/acessories'] = 'acessorios/index';
// $route['^(pt|en|it)/linee/(:any)'] = 'acessorios/index/$1';

$route['^(pt|en|it)/obrigado'] = 'obrigado/index';

$route['^(pt|en|it)/(:any)'] = 'produtos/index';
$route['^(pt|en|it)/(:any)'] = 'produtos/index';
$route['^(pt|en|it)/(:any)'] = 'produtos/index';

$route['^(pt|en|it)/orcamento/enviar'] = 'orcamento/enviar';

$route['^(pt|en|it)/contato/enviar'] = 'contato/enviar';




$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



// $route['^(pt|en|es)/colecao'] = 'colecao/index';
// $route['^(pt|en|es)/colecao/busca'] = 'colecao/busca';
// $route['^(pt|en|es)/colecao/campanha'] = 'colecao/filtro/campanha';
// $route['^(pt|en|es)/colecao/(:any)'] = 'colecao/categoria/$2';
// $route['^(pt|en|es)/colecao/(:any)/(:any)'] = 'colecao/produto/$2';