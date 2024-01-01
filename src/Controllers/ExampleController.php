<?php
namespace Project\Controllers;

use Project\Core\Request;
use Project\Core\Response;
use Project\Core\Route;

class ExampleController extends BaseController
{
    #[Route("/", "GET")]
    function index(Request $request, Response $response)
    {
        // Render a view
        $this->view->render("home");
    }

    #[Route("/", "POST")]
    function exampleCustomResponse(Request $request, Response $response)
    {
        $data = $request->validate([
            "test" => ["required", "email"],
            // optional rule always add corresponding input data to result even if input data is null
            "test2" => ["optional"]
        ], [
            "test.required" => "Le champs test est requis",
            "test.email" => "L'email est incorrect",
        ]);
        // Check if validator has found error
        if ($data["hasError"]) {
            $response->json($data["errors"]);
            $response->setStatus(400);
            return $response;
        }

        $response->json($data["data"]);
        return $response;
    }
}
?>