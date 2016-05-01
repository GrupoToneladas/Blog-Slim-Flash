<?php

$app->get('/', App\Action\HomeAction::class)
    ->setName('home');

$app->get('/admin', function ($request, $response, $args) {
    # Faça aqui a verificação se o usuário está logado
    $this->flash->addMessage('error', 'Você deve estar logado');

    return $response->withStatus(302)->withHeader('Location', '/');
})
->setName('admin');
