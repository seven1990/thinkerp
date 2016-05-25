<?php

namespace Wms;
return array(
     'controllers' => array(
         'invokables' => array(
             'Wms\Controller\Index' => Controller\IndexController::class,
         ),
     ),
     'router' => array(
         'routes' => array(
             'wms' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/Wms[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Wms\Controller\Index',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),
     'view_manager' => array(
         'template_path_stack' => array(
             'wms' => __DIR__ . '/../view',
         ),
     ),
 );