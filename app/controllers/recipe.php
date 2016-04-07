<?php 


	class Recipe extends Controller {


		public function index() {

			$recipe = $this->model('Recipes');
			$result = $recipe->getRecipes();
			$category = $recipe->getCategory();

			$this->view('recipe/index', ['recipe' => $result,'category' => $category]);
		}

		public function store() {

			$insert_recipe = $this->model('Recipes');
			$isExist = $insert_recipe->isRecipeExist($_POST['add_recipe_name'],$_POST['add_recipe_ingredients'],$_POST['add_recipe_category']);

			$recipe = trim(preg_replace('/\s+\r\n/', '', $_POST['add_recipe_name']));
			$ingredient = trim(preg_replace('/\s+\r\n/', '', $_POST['add_recipe_ingredients']));
			if($isExist == true) {
				$this->view('request/message', ['exist' => true]);
			} else {
				$result = $insert_recipe->insertRecipe($_POST['add_recipe_name'],$ingredient,$_POST['add_recipe_category']);
				$this->view('request/add', ['add' => $ingredient]);
			}

		}

		public function show() {

			$show_recipe = $this->model('Recipes');
			$result = $show_recipe->getRecipeById($_POST['recipe_id']);

			if(!empty($result)) {

				echo json_encode($result);
			}

		}

		public function update() {

			$update_recipe = $this->model('Recipes');
			$result = $update_recipe->updateRecipe($_POST['hidden_recipe_id'],$_POST['update_recipe_category'],$_POST['update_recipe_name'],$_POST['update_recipe_ingredients']);

			$this->view('request/update', ['update' => $result]);
		}

		public function delete() {

			$delete_recipe = $this->model('Recipes');
			
			$result = $delete_recipe->deleteRecipe($_GET['recipe_id']);

			$this->view('request/delete', ['delete' => $result]);
		}
	}