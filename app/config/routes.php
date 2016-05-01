<?php

$app->get('/', App\Action\HomeAction::class)
    ->setName('home');
