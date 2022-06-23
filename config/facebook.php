<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Facebook API Configuration
| -------------------------------------------------------------------
|
| To get an facebook app details you have to create a Facebook app
| at Facebook developers panel (https://developers.facebook.com)
|
|  facebook_app_id               string   Your Facebook App ID.
|  facebook_app_secret           string   Your Facebook App Secret.
|  facebook_login_redirect_url   string   URL to redirect back to after login. (do not include base URL)
|  facebook_logout_redirect_url  string   URL to redirect back to after logout. (do not include base URL)
|  facebook_login_type           string   Set login type. (web, js, canvas)
|  facebook_permissions          array    Your required permissions.
|  facebook_graph_version        string   Specify Facebook Graph version. Eg v3.2
|  facebook_auth_on_load         boolean  Set to TRUE to check for valid access token on every page load.
EAAHDtyOuRAsBALv5dXhXQQmRkNwMym2NQhJyYdHr3edqsygdvJuHXFCsntNiGpoq8IjANcN49jLKjcl7idbltDjRZATlPiZBmcAZAY0E53JLz2333HLOwZAfzmogDvIXAfYx4CJilcM9EYVk2o9mzAZBOLC17j4HEiLxrONeKlaEqLuoSYSLFkn7I7UkKTJ8ZD
*/

// $config['facebook_app_id']                = '496666321765387';
$config['facebook_app_secret']            = 'd20a8d2e8b5b17d94b8491932230125c';
$config['facebook_app_id']                = '496666321765387';
//$config['facebook_app_secret']            = '9b615de372097d3e8d4b4ba2a5f3ef6a';
$config['facebook_login_redirect_url']    = 'Facebook_controller';
//$config['facebook_login_redirect_url']    = 'https://www.astrovedvakta.com/userdashboard';
$config['facebook_logout_redirect_url']   = 'logout_user';
$config['facebook_login_type']            = 'web';
$config['facebook_permissions']           = array('email');
$config['facebook_graph_version']         = 'v3.2';
$config['facebook_auth_on_load']          = TRUE;

?>