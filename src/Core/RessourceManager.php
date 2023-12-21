<?php
namespace Project\Core;

class RessourceManager
{
    /**
     * Css files should be used on the header
     */
    private array $cssFiles = [];
    /**
     * Js files should be used at end of the body
     */
    private array $jsFiles = [];
    /**
     * Base path ressource
     */
    public string $ressourcePath = "cdn/";
    /**
     * Get url for serve a file
     */
    function get(string $fileName)
    {
        return CONFIG["ressources"]["hostname"] . "/public/" . $this->ressourcePath . $fileName;
    }

    /**
     * Add css file to be served on the head
     */
    function css(string $fileName)
    {
        if (!file_exists("../../public" . $this->ressourcePath . $fileName)) {
            copy(ROOT . "Ressources/" . $fileName, "../../public/" . $this->ressourcePath . $fileName);
        }
        array_push($this->cssFiles, $fileName);
    }

    /**
     * Add js file to be served on body end
     */
    function js(string $fileName)
    {
        if (!file_exists("../../public" . $this->ressourcePath . $fileName)) {
            copy(ROOT . "Ressources/" . $fileName, "../../public/" . $this->ressourcePath . $fileName);
        }
        array_push($this->jsFiles, $fileName);
    }

    /**
     * Get all css files
     */
    function getCSS()
    {
        return $this->cssFiles;
    }
    /**
     * Get all js files
     */
    function getJS()
    {
        return $this->jsFiles;
    }
}
?>