<?php
date_default_timezone_set("Asia/Chongqing");  //需要用到日期，强制设置时区

cache::config('default', array('engine' => 'File'));

/**
 * The settings below can be used to set additional paths to models, views and controllers.
 *
 * App::build(array(
 *     'plugins' => array('/full/path/to/plugins/', '/next/full/path/to/plugins/'),
 *     'models' =>  array('/full/path/to/models/', '/next/full/path/to/models/'),
 *     'views' => array('/full/path/to/views/', '/next/full/path/to/views/'),
 *     'controllers' => array('/full/path/to/controllers/', '/next/full/path/to/controllers/'),
 *     'datasources' => array('/full/path/to/datasources/', '/next/full/path/to/datasources/'),
 *     'behaviors' => array('/full/path/to/behaviors/', '/next/full/path/to/behaviors/'),
 *     'components' => array('/full/path/to/components/', '/next/full/path/to/components/'),
 *     'helpers' => array('/full/path/to/helpers/', '/next/full/path/to/helpers/'),
 *     'vendors' => array('/full/path/to/vendors/', '/next/full/path/to/vendors/'),
 *     'shells' => array('/full/path/to/shells/', '/next/full/path/to/shells/'),
 *     'locales' => array('/full/path/to/locale/', '/next/full/path/to/locale/')
 * ));
 *
 */

/**
 * Custom Inflector rules, can be set to correctly pluralize or singularize table, model, controller names or whatever other
 * string is passed to the inflection functions
 *
 * Inflector::rules('singular', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 * Inflector::rules('plural', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 *
 */

/**
 * Plugins need to be loaded manually, you can either load them one by one or all of them in a single call
 * Uncomment one of the lines below, as you need. make sure you read the documentation on CakePlugin to use more
 * advanced ways of loading plugins
 *
 * CakePlugin::loadAll(); // Loads all plugins at once
 * CakePlugin::load('DebugKit'); //Loads a single plugin named DebugKit
 *
 */


//CakePlugin::load('Acl'); //Loads a single plugin named DebugKit
/**
 * Libraries
 */
App::import('Vendor', 'Spyc/Spyc');

/**
 * Settings
 */
if (file_exists(APP . 'Config' . DS . 'settings.yml')) {
    $settings = Spyc::YAMLLoad(file_get_contents(APP . 'Config' . DS . 'settings.yml'));
    foreach ($settings as $settingKey => $settingValue) {
        Configure::write($settingKey, $settingValue);
    }
}

define('UPLOAD_PATH', APP.'webroot'.DS.'upload'.DS.'user'.DS); //用户上传目录
define('UPLOAD_VIEW_PATH', '/upload/user/'); //用户上传WEB访问目录

define('ELEMENT_PATH', APP.'View'.DS.'Elements'.DS);

CakePlugin::load('Wczhs', array('bootstrap' => false, 'routes' => true));
