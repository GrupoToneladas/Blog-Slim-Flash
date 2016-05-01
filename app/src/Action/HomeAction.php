<?php

namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class HomeAction
{
    private $view;
    private $flash;

    public function __construct(Twig $view, $flash)
    {
        $this->view = $view;
        $this->flash = $flash;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $message = $this->flash->getMessages();

        $this->view->render($response, 'home.html', [
            'message' => $message,
        ]);

        return $response;
    }
}
