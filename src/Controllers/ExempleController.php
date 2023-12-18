<?php
namespace TodoList\Project\Controllers;

use TodoList\Project\Core\Request;
use TodoList\Project\Core\Response;
use TodoList\Project\Core\Route;

class ExempleController extends BaseController
{
    #[Route("/", "GET")]
    function index(Request $request, Response $response)
    {
        // Render a view
        $this->view->render("home");
    }

    #[Route("/", "POST")]
    function exempleCustomResponse(Request $request, Response $response)
    {
        $response->json(["exemple" => "test"]);
        return $response;
    }
}
?>