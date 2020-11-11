<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Utils\Transform;

class IndexController extends AbstractController
{
    /**
     * @Route("", name="index")
     * @param Transform $transform
     * @return Response
     */
    public function index(Transform $transform): Response {
        $message = "";

        // Get the Request object
        $request = Request::createFromGlobals();
        // Check if user submitted the form in index.html.twig
        if ($request->isMethod('POST')) {
            // Get the submitted message input value
            if ($request->request->get('message')) {
                $message = $request->request->get('message');
                $className = $request->request->get('classNames');
                // Use the transform method of Capitalize class to make message's variable odd letters uppercase
                $transform->setMessage($message);
                $message = $transform->transform($message, $className);
                $transform->log();
            }
        }

        return $this->render('index/index.html.twig', [
            'message' => $message // Send to index.html.twig the empty message or the message input value
        ]);
    }
}
