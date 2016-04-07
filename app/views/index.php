<!DOCTYPE html>
<html>
<head>
	<title>My Recipe App</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="../../public/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../public/assets/bootstrap/css/bootstrap.css">
</head>
<style type="text/css">
	.container {margin-top: 20px; padding: 10px;}
	#recipe-category {width: 200px;}
	#recipe-ingredients {height: 50px;}
	#update-recipe-ingredients {overflow: scroll; height: 200px; resize: none;}
	#recipe-ingredients {overflow: scroll; height: 200px; resize: none;}
</style>
<body>
	<div class="container">
		<div class="row">
			<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addModal">
	        	<span class="glyphicon glyphicon-plus-sign" style="margin-right: 10px;"></span>
	        	ADD
	      	</button>
	      	<?php if($data['recipe'] != null): ?>
			<table class="table table-striped table-bordered">
				<tr>
					<th>Category</th>
					<th>Recipe</th>
					<th>Action</th>
				</tr>
				<tbody>
					<?php foreach($data['recipe'] as $key => $values): ?>
						<tr>
							<td class="col-sm-1"><?php echo $values['category_name'] ?></td>
							<td class="col-sm-3"><?php echo $values['recipe_name']; ?></td>
							<td class="col-sm-1">
								<button type="button" class="btn btn-primary btn-sm col-sm-6" data-value="<?php echo $values['recipe_id']; ?>" data-toggle="modal" data-target="#updateModal" id="update-recipe">Edit</button>
								<a href="delete?recipe_id=<?php echo $values['recipe_id']; ?>" class="btn btn-primary btn-sm col-sm-6">Delete</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<?php else: ?>
				<center><h2>No Current Data</h2></center>
			<?php endif ?>
		</div>

		<!-- Add Modal -->
		<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
		        	<button class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        		<h4 class="modal-title" id="myModalLabel">Add New Recipe</h4>
		      		</div>
		      		<form method="POST" action="store" name='add-recipe'>
			      		<div class="modal-body">
			      			<select name="recipe-category" id="recipe-category" class="form-control">
			      				<?php foreach($data['category'] as $key => $values): ?>
			      					<option value="<?php echo $values['category_id']; ?>"><?php echo $values['category_name']?></option>
			      				<?php endforeach ?>
			      			</select></br>
			        		<input type="text" name="recipe-name" id="recipe-name" placeholder="Recipe Name" class="form-control"><br/>			        		
			        		<textarea name="recipe-ingredients" id="recipe-ingredients" class="form-control"></textarea>
			      		</div>
			      		<div class="modal-footer">
			        		<button class="btn btn-default" data-dismiss="modal">Close</button>
			        		<button type="submit" class="btn btn-primary" id="add-recipe">Add Recipe</button>
			      		</div>
		      		</form>
		    	</div>
		  	</div>
		</div>

		<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
		        	<button class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        		<h4 class="modal-title" id="myModalLabel">Update Recipe</h4>
		      		</div>
		      		<form method="POST" action="store">
			      		<div class="modal-body">
			      			<select name="update-recipe-category" id="update-recipe-category" class="form-control">
			      				<?php foreach($data['category'] as $key => $values): ?>
			      					<option value="<?php echo $values['category_id']; ?>"><?php echo $values['category_name']?></option>
			      				<?php endforeach ?>
			      			</select></br>
			        		<input type="text" name="update-recipe-name" id="update-recipe-name" placeholder="Recipe Name" class="form-control"><br/>
			        		<textarea name="update-recipe-ingredients" id="update-recipe-ingredients" class="form-control"></textarea>
			      		</div>
			      		<div class="modal-footer">
			        		<button class="btn btn-default" data-dismiss="modal">Close</button>
			        		<button type="submit" class="btn btn-primary" id="update-recipe">Update Recipe</button>
			      		</div>
		      		</form>
		    	</div>
		  	</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript" src="../../public/assets/bootstrap/js/jquery-1.12.0.js"></script>
<script type="text/javascript" src="../../public/assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../public/assets/bootstrap/js/vanilla.js"></script>