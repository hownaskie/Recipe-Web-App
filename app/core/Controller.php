<?php

	class Controller {


		public function model($model) {

			require_once '../app/models/' . $model .'.php';

			return new $model();
		}


		public function view($view, $data = []) {

			require_once '../app/views/' . $view .'.php';

		}

		// public function is_ajax($view,$data = []) {

		// 	require_once '../app/views/' . $view . '.php';

		// 	return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLhttpRequest');
		// }
	}