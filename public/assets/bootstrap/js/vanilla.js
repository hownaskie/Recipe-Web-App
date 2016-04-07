
document.getElementById('add-recipe-button').disabled = true;
var listener = document.querySelectorAll("button[type='button']");

for(var i = 0;i < listener.length;i++) {
	listener[i].addEventListener('click', checkCredentials);
}

//add recipe validation
document.getElementById('recipe-category').onblur = function() {
	validateAddRecipe();
}

document.getElementById('recipe-name').onblur = function() {
	validateAddRecipe();
}

document.getElementById('recipe-ingredients').onblur = function() {
	validateAddRecipe();
}
//end of recipe add validation

//update recipe validation
document.getElementById('update-recipe-name').onblur = function() {
	validateUpdateRecipe();
}

document.getElementById('update-recipe-ingredients').onblur = function() {
	validateUpdateRecipe();
}
//end of update recipe validation

function validateAddRecipe() {
	var category = document.add_recipe_form.add_recipe_category;
	var recipe = document.add_recipe_form.add_recipe_name;
	var ingredients = document.add_recipe_form.add_recipe_ingredients;
	var message = document.getElementById('message');

	if(category.value == "" || category.value == null) {
		document.getElementById('add-recipe-button').disabled = true;
		document.getElementById('message').innerHTML = "Please complete the following field.";
		message.style.display = 'block';
		return false;
	}

	if(recipe.value == "" || recipe.value == null) {
		document.getElementById('add-recipe-button').disabled = true;
		document.getElementById('message').innerHTML = "Please complete the following field.";
		message.style.display = 'block';
		return false;
	}

	console.log(ingredients.value);
	if(ingredients.value == "" || ingredients.value == null) {
		document.getElementById('add-recipe-button').disabled = true;
		document.getElementById('message').innerHTML = "Please complete the following field.";
		message.style.display = 'block';
		return false;
	}

	message.style.display = 'none';
	
	document.getElementById('add-recipe-button').disabled = false;
	return true;
}

function validateUpdateRecipe() {
	var category = document.update_recipe_form.update_recipe_category;
	var recipe = document.update_recipe_form.update_recipe_name;
	var ingredients = document.update_recipe_form.update_recipe_ingredients;

	if((recipe.value == "" || recipe.value == null)) {
		document.getElementById('update-recipe-button').disabled = true;
		return false;
	}

	if(ingredients.value == "" || ingredients.value == null) {
		document.getElementById('update-recipe-button').disabled = true;
		return false
	}

	document.getElementById('update-recipe-button').disabled = false;
	return true;
}


function createRequest() {
	try {
		request = new XMLHttpRequest();
	}  catch (tryMS) {
		try {
			request = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (otherMS) {
			try {
				request = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (failed) {
				request = null;
			}
		}
	}

	return request;
}

function ChangeUrl(url) {
    if (typeof (history.pushState) != "undefined") {
        var obj = { Url: url };
        history.pushState(obj, obj.Url);
        return history.state.Url;
    } else {
        alert("Browser does not support HTML5.");
    }
}


function checkCredentials(e) {
	request = createRequest();
	if (request == null)
		console.log("Unable to create request!");
	else
	{
		var id = e.target.getAttribute('data-value');
		
		// var rt = document.URL.split('index');
		// var theUrl = rt[0] + ChangeUrl('show');
		var theUrl = 'show';
		var requestData = "recipe_id=" + parseInt(id);

		request.onreadystatechange = showRequestStatus;
		request.open("POST", theUrl, true);
		request.setRequestHeader("Content-Type",
			"application/x-www-form-urlencoded");
		request.send(requestData);

		credentialsValid = true;
	}
}

function replacer(key, value) {
  if (typeof value === "string") {
    return undefined;
  }
  return value;
}

function showRequestStatus() {
	if (request.readyState == 4) {
		if (request.status == 200) {
			var obj = JSON.parse(request.responseText);
			
			document.getElementById('hidden-recipe-id').value = obj.recipe_id;
		 	document.getElementById('update-recipe-category').value = obj.category_id_fk;
		 	document.getElementById('update-recipe-name').value = obj.recipe_name;
		 	document.getElementById('update-recipe-ingredients').value = obj.ingredients;

		}
	}
}