<?php

$container = $app->getContainer();

$container['view'] = function ($container) {
    $settings = $container->get('settings')['view'];
    $view = new \Slim\Views\Twig($settings['template_path'], [
        'cache' => $settings['cache_path']
    ]);

    $view->addExtension(new \Slim\Views\TwigExtension(
        $container['router'],
        $container['request']->getUri()
    ));

    $env = $view->getEnvironment();
    $env->addGlobal('messages', $container->get('flash')->getMessages());
    $env->addGlobal('session', $_SESSION);

    return $view;
};

$container['flash'] = function () {
    return new \Slim\Flash\Messages();
};

# Actions
$container[App\Action\HomeAction::class] = function ($container) {
    return new App\Action\HomeAction($container->get('view'));
};
