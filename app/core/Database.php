<?php 


	class Database {

		protected $database;


		function __construct() {

			$this->database = new mysqli(HOST,USERNAME,PASSWORD,DATABASE);
		}

		public function db() {

			try {
				if($this->database == true) {

					return $this->database;
				} else {

					return false;
				}
			} catch (Exception $e) {

				error_log($e->getMessage());
			}
		}
	}