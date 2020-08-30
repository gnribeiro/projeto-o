<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = 'error404';
#$route['welcome/(:any)'] = "admin/welcome/$1/";

/* Route to default controller                                                                                                     
*/
// $route['(\w{2})/(.*)'] = '$2'; 
 //$route['(.*)'] = $route['default_controller'].'/index/$1';

// example: '/en/about' -> use controller 'about'
$route['pt-PT/competencias/(.+)?'] = 'competencias/index/$1/$2';
$route['en-GB/competencias/(.+)?'] = 'competencias/index/$1/$2';
$route['competencias/(.+)?'] = 'competencias/index/$1/$2';

$route['pt-PT/obras/(.+)?'] = 'obras/index/$1/$2/$3';
$route['en-GB/obras/(.+)?'] = 'obras/index/$1/$2/$3';
$route['obras/(.+)?'] = 'obras/index/$1/$2/$3';

$route['^pt-PT/(.+)$'] = "$1";
$route['^en-GB/(.+)$'] = "$1";
 
// '/en' and '/fr' -> use default controller
$route['^pt-PT$'] = $route['default_controller'];
$route['^en-GB$'] = $route['default_controller'];
 

//$routes['^pt-PT/competencias/Organigrama'] = "competencias/index/$1"; 

/* End of file routes.php */
/* Location: ./application/config/routes.php */
