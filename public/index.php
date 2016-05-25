<?php
/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server') {
    $path = realpath(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    if (__FILE__ !== $path && is_file($path)) {
        return false;
    }
    unset($path);
}



// Setup autoloading
require 'init_autoloader.php';

// Run the application!
Zend\Mvc\Application::init(require 'config/application.config.php')->run();


//实例化所有的数据库适配器
$configs = new Zend_Config_Ini(APPLICATION_PATH.'/configs/serverConfig.ini');
$dbAdapters = array();
//$configArray = array();
$registry=Zend_Registry::getInstance();
foreach ($configs as $config){
	$databaseName = $config->db->params->dbname;
	$registry=Zend_Registry::getInstance();
	$configArray[$databaseName] = $config;
	$registry->set('configArray',$configArray);
	//配置数据库
	$db=Zend_Db::factory($config->db); //实例化一个合适的数据库适配器
	$db->query("set names utf8");
	$dbAdapters[$databaseName] = $db;
	$dbAdapters[$databaseName] = Zend_Db::factory($config->db->adapter,$config->db->params->toArray());
	if(($config->db->params->default) == 1){
	Zend_Db_Table::setDefaultAdapter($db);
	}
}
$registry->set('dbAdapters', $dbAdapters);