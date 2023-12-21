<?php
namespace Project\Controllers;

use Attribute;
use Project\Core\ViewManager;

#[Attribute]
abstract class BaseController
{
    /**
     * Instance of ViewManager
     */
    public ViewManager $view;

    function __construct()
    {
        $this->view = new ViewManager();
    }

}
?>