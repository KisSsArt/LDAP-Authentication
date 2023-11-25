function logout()
{
	var xhr = new XMLHTTPRequest();
	xhr.omload = function() { document.location = "index.php"; }
	xhr.open('GET', 'index.php', true);
	xhr.send();
}

function createButton()
{
	var button = document.createElement("button");
	button.title = "Sign Out";
	button.addEventListener('click', function() { logout();  });
	document.getElementById("signoutform").appendChild(button);
}

document.addEventListener('DOMContentLoaded', function() { createButton(); });
