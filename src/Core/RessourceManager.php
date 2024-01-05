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
     * Get url for serve a file
     */
    function get(string $fileName): string
    {
        $regexUrl = "((https?|ftp)\:\/\/)?"; // SCHEME Check
        $regexUrl .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // User and Pass Check
        $regexUrl .= "([a-z0-9-.]*)\.([a-z]{2,3})"; // Host or IP Check
        $regexUrl .= "(\:[0-9]{2,5})?"; // Port Check
        $regexUrl .= "(\/([a-z0-9+\$_-]\.?)+)*\/?"; // Path Check
        $regexUrl .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?"; // GET Query String Check
        $regexUrl .= "(#[a-z_.-][a-z0-9+\$_.-]*)?"; // Anchor Check

        // If the filename is url, serve url otherwise get a local file corresponding to fileName
        if (preg_match("/^$regexUrl$/i", $fileName)) {
            return $fileName;
        }
        // Check if current host use https or not
        $protocol = isset($_SERVER["HTTPS"]) ? "https://" : "http://";
        // Get first slash to slice host and get only hostname
        $firstSlash = strpos($_SERVER["HTTP_HOST"], "/");
        $hostName = "";
        // If first slash was not found, host is root url
        if (!$firstSlash) {
            $hostName = $_SERVER["HTTP_HOST"];
        } else {
            // Slice host to get only hostname
            $hostName = substr($_SERVER["HTTP_HOST"], $firstSlash);
        }
        return $protocol . $hostName . "/" . $fileName;
    }

    /**
     * Add css file to be served on the head
     */
    function css(string $fileName)
    {
        array_push($this->cssFiles, $fileName);
    }

    /**
     * Add js file to be served on body end
     */
    function js(string $fileName)
    {
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