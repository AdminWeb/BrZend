<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'BrZend\Controller\Index' => 'BrZend\Controller\IndexController',
        ),
    ),
    'view_helpers' => array(
        'invokables' => array(            
            'cep'=>'BrZend\View\Helper\CEP',
            'cnpj'=>'BrZend\View\Helper\CNPJ',
            'cpf'=>'BrZend\View\Helper\CPF',
        )
    ),
    'router' => array(
        'routes' => array(
            'br-zend' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/br-zend',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'BrZend\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'BrZend' => __DIR__ . '/../view',
        ),
    ),
);
