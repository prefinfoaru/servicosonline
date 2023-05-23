<?php

namespace Apps\Http;

class Rest
{
	private $request;

	private $class;
	private $method;
	private $params = array();

	public function __construct($req)
	{
		$this->request = $req;
		$this->load();
	}

	public function load()
	{
		$newUrl = explode('/', $this->request['url']);
		array_shift($newUrl);

		if (isset($newUrl[0])) {
			$this->class = ucfirst($newUrl[0]) . 'Controller';
			array_shift($newUrl);

			if (isset($newUrl[0])) {
				$this->method = $newUrl[0];
				array_shift($newUrl);

				if (isset($newUrl[0])) {
					$this->params = $newUrl;
				}
			}
		}
	}

	public function run()
	{
		if (class_exists('\Apps\Http\Controllers\\' . $this->class) && method_exists('\Apps\Http\Controllers\\' . $this->class, $this->method)) {

			try {
				$controll = "\Apps\Http\Controllers\\" . $this->class;
				$response = call_user_func_array(array(new $controll, $this->method), $this->params);
				if ($response == false) {
					return json_encode(array('data' => 'Ocorreu um erro ao efetuar a busca', 'status' => 'error'));
				} else {
					return json_encode(array('data' => $response, 'status' => 'sucess'));
				}
			} catch (\Exception $e) {
				return json_encode(array('data' => $e->getMessage(), 'status' => 'error'));
			}
		} else {
			// $controll = "\Apps\Http\Controllers\\" . $this->class;
			// $response = call_user_func_array(array(new $controll, $this->method), $this->params);
			return json_encode(array('data' => 'Operação Inválida', 'status' => 'error'));
		}
	}
}
