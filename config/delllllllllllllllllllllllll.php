<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '436344221628-j06jsj4mtafhjb8vjpk8dr5ul5tp17jj.apps.googleusercontent.com';
$config['google']['client_secret']    = '_9oKPGjWmUfzFo_hgAbjJFXj';
$config['google']['redirect_uri']     = 'http://testpnp.ml/astro/google_controller/';
$config['google']['application_name'] = 'astro ved vakta';
$config['google']['api_key']          = 'AIzaSyCV8SpGhJ1UlqoHs4tUTfzcfThgYKfeENE';
$config['google']['scopes']           = array();
?>