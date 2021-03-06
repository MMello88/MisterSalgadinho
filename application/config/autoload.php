<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| AUTO-LOADER
| -------------------------------------------------------------------
| This file specifies which systems should be loaded by default.
|
| In order to keep the framework as light-weight as possible only the
| absolute minimal resources are loaded by default. For example,
| the database is not connected to automatically since no assumption
| is made regarding whether you intend to use it.  This file lets
| you globally define which systems you would like loaded with every
| request.
|
| -------------------------------------------------------------------
| Instructions
| -------------------------------------------------------------------
|
| These are the things you can load automatically:
|
| 1. Packages
| 2. Libraries
| 3. Drivers
| 4. Helper files
| 5. Custom config files
| 6. Language files
| 7. Models
|
*/

/*
| -------------------------------------------------------------------
|  Auto-load Packages
| -------------------------------------------------------------------
| Prototype:
|
|  $autoload['packages'] = array(APPPATH.'third_party', '/usr/local/shared');
|
*/
$autoload['packages'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Libraries
| -------------------------------------------------------------------
| These are the classes located in system/libraries/ or your
| application/libraries/ directory, with the addition of the
| 'database' library, which is somewhat of a special case.
|
| Prototype:
|
|	$autoload['libraries'] = array('database', 'email', 'session');
|
| You can also supply an alternative library name to be assigned
| in the controller:
|
|	$autoload['libraries'] = array('user_agent' => 'ua');
*/
//require(APPPATH.'libraries/Control.php');
$autoload['libraries'] = array('database', 'session', 'form_validation', 'bcrypt', 'pagination', 'error_db');

/*
| -------------------------------------------------------------------
|  Auto-load Drivers
| -------------------------------------------------------------------
| These classes are located in system/libraries/ or in your
| application/libraries/ directory, but are also placed inside their
| own subdirectory and they extend the CI_Driver_Library class. They
| offer multiple interchangeable driver options.
|
| Prototype:
|
|	$autoload['drivers'] = array('cache');
|
| You can also supply an alternative property name to be assigned in
| the controller:
|
|	$autoload['drivers'] = array('cache' => 'cch');
|
*/
$autoload['drivers'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Helper Files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['helper'] = array('url', 'file');
*/
$autoload['helper'] = array('url', 'html', 'form', 'funcoes', 'security', 'date');

/*
| -------------------------------------------------------------------
|  Auto-load Config files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['config'] = array('config1', 'config2');
|
| NOTE: This item is intended for use ONLY if you have created custom
| config files.  Otherwise, leave it blank.
|
*/
$autoload['config'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Language files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['language'] = array('lang1', 'lang2');
|
| NOTE: Do not include the "_lang" part of your file.  For example
| "codeigniter_lang.php" would be referenced as array('codeigniter');
|
*/
$autoload['language'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['model'] = array('first_model', 'second_model');
|
| You can also supply an alternative model name to be assigned
| in the controller:
|
|	$autoload['model'] = array('first_model' => 'first');
*/
$autoload['model'] = array(
'ModeloList/Listaclientes'             => 'listaclientes',
'ModeloList/Listaenderecos'            => 'listaenderecos',
'ModeloList/Listacarts'                => 'listacarts',
'ModeloList/Listacidades'              => 'listacidades',
'ModeloList/Listapedidos'              => 'listapedidos',
'ModeloList/Listacategoriasproduto'    => 'listacategoriasproduto',
'ModeloList/Listaprodutos'             => 'listaprodutos',
'ModeloList/Listatipo'                 => 'listatipo',
'ModeloList/Listavaloresproduto'       => 'listavaloresproduto',
'ModeloList/Listanewsletters'          => 'listanewsletters',
'ModeloList/Listarepresentantecliente' => 'listarepresentantecliente',
'ModeloList/Listarepresentanterecebimento' => 'listarepresentanterecebimento',

'Modelo/representante_cliente'         => 'representante_cliente', 
'Modelo/representante_recebimento'     => 'representante_recebimento',
'Modelo/cliente'                       => 'cliente',
'Modelo/ususario'                       => 'usuario',
'Modelo/endereco'                      => 'endereco',
'Modelo/cart'                          => 'cart',
'Modelo/evento'                        => 'evento',
'Modelo/pedido'                        => 'pedido',
'Modelo/item_pedido'                   => 'item_pedido',
'Modelo/SitemapModel'                  => 'sitemapmodel',
'Modelo/newsletter'                    => 'newsletter',
'Modelo/Movimentacao_estoque'          => 'movimentacao_estoque');
