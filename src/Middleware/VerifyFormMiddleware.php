<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class VerifyFormMiddleware 
{
    private $forms;
    private $messages = [];

    /**
     * 
     *
     * @param \App\Form\Form[] $forms
     */
    public function __construct (array $forms) {
        $this->forms = $forms;
    }

    public function __invoke (Request $request, Response $response, callable $next) {
        if ($this->isValid($request)) {
            return $next ($request, $response);
        }

        return $response
            ->withJson([
                'error' => true,
                'messages' => $this->messages
            ]);
    }

    private function isValid (Request $request) : bool 
    {
        foreach ($this->forms as $form) {
            if (!$form->isValid ($request)) {
                $this->messages = \array_merge($this->messages, $form->getMessages());
                return false;
            }
        }

        return true;
    }
}