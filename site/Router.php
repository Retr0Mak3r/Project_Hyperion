<?php
namespace Router;
use Controller\Controller;

/**
 * Class Router used to route all request on project hyperion website
 * @package Router
 * @author Macaron
 */
class Router{
	/** @var string $uri URI of the request */
	private string $uri;
	/** @var string $method HTTP method of the request; */
	private string $method;
	/** @var string */
	public const GET = "GET";
	/** @var string */
	public const POST = "POST";
	/**
	 * Router constructor.
	 */
	public function __construct(){
		$this->uri = $_SERVER["REQUEST_URI"];
		$this->method = $_SERVER["REQUEST_METHOD"];
	}

	/**
	 * take router pattern and test it returning the matches if it match and false in the other case
	 * @param string $pattern
	 * @return array|bool
	 */
	private function match(string $pattern): array|bool{
		$regex = "/" . str_replace("\*", "(.*)", preg_quote($pattern, "/")) . "/";
		if(preg_match($regex, $this->uri, $matches) === 1){
			array_shift($matches);
			return $matches;
		}
		return false;
	}
	/**
	 * Route GET request with matching pattern (use * as wildcard character)
	 * @param string $pattern Pattern to match with
	 * @param Controller $controller Controller to use if pattern match
	 */
	public function get(string $pattern = "/", Controller $controller){
		if($_SERVER["REQUEST_METHOD"] == "GET"){
			if(($matches = $this->match($pattern)) !== false){
				$controller->get($matches);
			}
		}
	}
}