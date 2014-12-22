<?php

use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\View as View;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Mvc\Router as Router;
use Phalcon\Flash\Session as Flash;
use Phalcon\Mvc\Dispatcher as Dispatcher;
use Phalcon\Mvc\Model\Manager as ModelManager;

use Network\Events\EventsManager as EventsManager;
use Network\Core\Routes as Routes;
use Network\Security\Auth as Auth;
use Network\Filters\FilterGroup as FilterGroup;
use Network\Commanding\CommandBus as CommandBus;
use Network\Querying\QueryBus as QueryBus;
use Network\Support\FileManager as FileManager;

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function () use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
}, true);

/**
 * Setting up the view component
 */
$di->set('view', function () use ($config) {

    $view = new View();

    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines(array(
        '.volt' => function ($view, $di) use ($config) {

            $volt = new VoltEngine($view, $di);

            // To enable caching - uncomment
            
            /*$volt->setOptions(array(
                'compiledPath' => $config->application->cacheDir,
                'compiledSeparator' => '_'
            ));*/
            $volt->getCompiler()->addFunction('implode', 'implode');
            $volt->getCompiler()->addFunction('array_chunk', 'array_chunk');
            return $volt;
        },
        '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
    ));
    return $view;
}, true);

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function () use ($config) {
    return new DbAdapter(array(
        'host' => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname' => $config->database->dbname
    ));
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function () {
    return new MetaDataAdapter();
});


/**
 * Start the session the first time some component request the session service
 */
$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});

/**
 * Flash messages
 */
$di->set('flash', function () {
    $flash = new Flash([
        'error' => 'alert alert-error',
        'success' => 'alert alert-success',
        'notice' => 'alert alert-info',
        'warning' => 'alert alern-warning'
    ]);
    
    return $flash;
});
    

/**
 * Rotues
 */
$di->set('router', function () {
    $router = new Router();
    $router->removeExtraSlashes(true);
    $router->mount(new Routes());
    return $router;
});

/**
 * Security
 * 
 */
$di->setShared('security', function() {

    $security = new Phalcon\Security();
    //Set the password hashing factor to 12 rounds
    $security->setWorkFactor(12);

    return $security;
});

$di->setShared('eventsManager', function () {
    $eventsManager = new EventsManager();
    $eventsManager->initialize();
    return $eventsManager;
});

/**
 * Dispatcher
 */
$di->setShared('dispatcher', function () use ($di){
    
    $dispatcher = new Dispatcher();
    $dispatcher->setEventsManager($di->getShared('eventsManager'));
   
    return $dispatcher;
});

/**
 * Filters
 */
$di->setShared('filters', function () {
    // $filters = new FilterGroup();
    
    return new FilterGroup();
});

/**
 * Auth
 * Singleton
 */
$di->setShared('auth', function () {
    return new Auth();
});

/**
 * CommandBus
 * Signleton
 */
$di->setShared('commandBus', function () {
    return new CommandBus();
});

/**
 * QueryBus
 * Singleton
 */
$di->setShared('queryBus', function () {
    return new QueryBus();
});

/**
 * Model manager
 */
$di->setShared('modelManager', function() {
    $manager = new ModelManager();
    return $manager;
});
