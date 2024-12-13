<?php

namespace MarieTeam\Router;

require dirname(__DIR__, 2) . '/config/routes.php';

if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle): bool
    {
        return $needle !== '' && mb_strpos($haystack, $needle) !== false;
    }
}

class Router {

	// property
	private $routes;
	private $availablePaths;
	private $requestedPath;

    //constructor
    public function __construct() {
		$this->routes = ROUTES;
		$this->availablePaths = array_keys($this->routes);
		$this->requestedPath = $_GET['path'] ?? '/';
		$this->parseRoutes();
	}

    //method
    private function explodePath(string $path): array {
		return explode('/', rtrim(ltrim($path, '/'), '/'));
	}

    private function parseRoutes() {
		$explodedRequestedPath = $this->explodePath($this->requestedPath);
		$params = [];

		foreach ($this->availablePaths as $candidatePath) {
			$foundMatch = true;
			$explodedCandidatePath = $this->explodePath($candidatePath);
			if (count($explodedCandidatePath) == count($explodedRequestedPath)) {
				foreach ($explodedRequestedPath as $key => $requestedPathPart) {
					$candidatePathPart = $explodedCandidatePath[$key];
					if ($this->isParam($candidatePathPart)) {
						$params[substr($candidatePathPart, 1, -1)] = $requestedPathPart;
					}
					else if ($candidatePathPart !== $requestedPathPart) {
						$foundMatch = false;
						break;
					}
				}

				if ($foundMatch) {
					$route = $this->routes[$candidatePath];
					break;
				}
			}
		}

        if (isset($route)) {
			$controller = new $route['controller'];
			$controller->{$route['method']}($params);
		}else{
            $controller = new $this->routes['/']['controller'];
            $controller->{$this->routes['/']['method']}();
        }
	}

    private function isParam(string $candidatePathPart): bool {
		return str_contains($candidatePathPart, '{') && str_contains($candidatePathPart, '}');
	}

}
