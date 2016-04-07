<?php 
	
	class Recipes {

		protected $db;

		function __construct() {

			$connection = new Database;
			$this->db = $connection->db();
		}

		public function getRecipes() {

			$query = "SELECT * FROM recipe AS r LEFT JOIN category AS c ON r.category_id_fk = c.category_id";

			$result = $this->db->query($query);

			if($result->num_rows > 0) {
				$array = [];
				while($row = $result->fetch_assoc()) {

					$array[] = $row;
				}

				return $array;
				$result->free();
			}
		}

		public function getRecipeById($id) {

			$query = "SELECT * FROM recipe AS r LEFT JOIN category AS c ON r.category_id_fk = c.category_id WHERE r.recipe_id = $id";

			$result = $this->db->query($query);

			if($result->num_rows > 0) {

				return $result->fetch_assoc();
				$result->free();
			} else {

				return false;
			}
		}

		public function getCategory() {

			$query = "SELECT * FROM category";

			$result = $this->db->query($query);

			if($result->num_rows > 0) {
				$array = [];
				while($row = $result->fetch_assoc()) {

					$array[] = $row;
				}

				return $array;
				$result->free();
			}

		}

		public function insertRecipe($recipe_name,$recipe_ingredients,$category_id) {


			if(isset($category_id) && isset($recipe_name) && isset($recipe_ingredients)) {

				$id = $this->db->real_escape_string($category_id);
				$recipe = $this->db->real_escape_string($recipe_name);
				$ingredients = $this->db->real_escape_string($recipe_ingredients);

				$query = "INSERT INTO `recipe`(`recipe_name`, `ingredients`, `category_id_fk`) 
								VALUES ('{$recipe}','{$ingredients}','{$id}')";
				
				$result = $this->db->query($query);

				if($result == true) {

					return true;
					$result->free();
				} else {

					return false;
				}
			} else {

				return false;
			}
		}

		public function updateRecipe($recipe_id,$category_id,$recipe_name,$recipe_ingredients) {

			if(isset($recipe_id) && isset($category_id) && isset($recipe_name) && isset($recipe_ingredients)) {

				$id = $this->db->real_escape_string($category_id);
				$recipe = $this->db->real_escape_string($recipe_name);
				$ingredients = $this->db->real_escape_string($recipe_ingredients);

				$query = "UPDATE `recipe` SET 
								`category_id_fk` = '{$id}',
								`recipe_name` = '{$recipe}',
								`ingredients` = '{$ingredients}'
						  WHERE `recipe_id` = '{$recipe_id}'";
				
				$result = $this->db->query($query);

				if($result == true) {

					return true;
					$result->free();
				} else {

					return false;
				}
			} else {

				return false;
			}
		}


		public function deleteRecipe($recipe_id) {

			if(isset($recipe_id)) {

				$query = "DELETE FROM `recipe` WHERE recipe_id = $recipe_id";

				$result = $this->db->query($query);

				if($result == true) {
					header('Location:index');
				}
			}
		}

		public function isRecipeExist($recipe_name,$recipe_ingredients,$category_id) {

			if(isset($recipe_name) && isset($recipe_ingredients) && isset($category_id)) {

				$query = "SELECT * FROM recipe WHERE recipe_name = '{$recipe_name}' AND ingredients = '{$recipe_ingredients}' AND category_id_fk = '{$category_id}'";

				$result = $this->db->query($query);

				if($result->num_rows > 0) {

					return true;
					$result->free();
				} else {

					return false;
				}
			}
		}
	}