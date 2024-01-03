<?php
namespace Project\Core;

use Exception;

final class Request
{
    /**
     * Request method
     * It can be: POST, GET
     */
    public string $method = "GET";
    /**
     * Request uri
     */
    public string $uri;
    /**
     * Request params
     */
    public array $params = [];
    /**
     * Request query string
     */
    public array $query = [];
    /**
     * Request files
     */
    public array $files = [];
    /**
     * Request body
     * Note: request body only work on POST method
     */
    public array $body = [];
    /**
     * Request client ip
     */
    public string $ip = "";

    function __construct()
    {
        $this->method = $_SERVER["REQUEST_METHOD"];
        $this->uri = $_SERVER["REQUEST_URI"];
        $this->ip = $_SERVER["REMOTE_ADDR"];
        $this->files = $_FILES;
        $this->body = $_POST;
        $this->query = $_GET;
    }

    /**
     * Validate data of current request.
     * 
     * Field name should be have error message for each rule.
     * 
     * Return result with this format.
     * <code>
     * [
     * "hasError" => true|false,
     * "data" => [allDataValided],
     * "errors" => [allErrors]
     * ]
     * </code>
     * 
     * Example
     * <code>
     * <?php
     * $request->validate([
            "myfield" => ["required", "min:12"],
            [
            "myfield.required" => "myfield is required",
            "myfield.min" => "myfield should be higher than 12 characters"
            ])
     * ?>
     * </code>
     */
    public function validate(array $datas, array $errorMessages): array
    {
        // Get all POST or GET request data and combine it
        $inputs = [...$this->body, ...$this->query];
        $results = ["hasError" => false, "errors" => [], "data" => []];
        // Loop on all data to be in the request
        foreach ($datas as $dataName => $rules) {
            $dataValue = $inputs[$dataName] ?? null;
            // Loop on rules
            foreach ($rules as $rule) {
                $ruleExploded = explode(":", $rule);
                $ruleName = $ruleExploded[0];

                $ruleValided = match ($ruleName) {
                    "required" => ValidatorRules::required($dataValue),
                    "min" => ValidatorRules::minLength($ruleExploded),
                    "max" => ValidatorRules::maxLength($ruleExploded),
                    "email" => ValidatorRules::email($dataValue),
                    "url" => ValidatorRules::url($dataValue),
                    "numeric" => ValidatorRules::numeric($dataValue),
                    "alpha" => ValidatorRules::alpha($dataValue),
                    "alphaNum" => ValidatorRules::alphaNum($dataValue),
                    "date" => ValidatorRules::date($dataValue),
                    // Return always true to add data value or null
                    "optional" => true,
                    default => throw new Exception("Invalid rule name"),
                };

                // Add error message corresponding to given error message for current rule
                if (!$ruleValided) {
                    $results["hasError"] = true;
                    $results["errors"][] = $errorMessages[$dataName . "." . $ruleName];
                } else {
                    $results["data"][$dataName] = $dataValue;
                }
            }
        }

        return $results;
    }
}
?>