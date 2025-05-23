<?php

namespace App\Controller;

abstract class AbstractController {

	protected function renderView(string $template, array $data = []): string {
		return require_once 'vue/layout.php';
	}

    protected function redirectToRoute(string $path, array $params = [])
    {
		$uri = $_SERVER['SCRIPT_NAME'] . "?path=" . $path;

		if (!empty($params)) {
			$strParams = [];
			foreach ($params as $key => $val) {
				array_push($strParams, urlencode((string) $key) . '=' . urlencode((string) $val));
			}
			$uri .= '&' . implode('&', $strParams);
		}

		header("Location: " . $uri);
		die;
	}

    public function api(string $model, string $method, array $data = []){
        return require_once 'api/api.' . $model . '.php';
    }

}