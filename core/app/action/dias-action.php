<?php
if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
if(count($_POST)>0){
	$user = new DiaData();
	$user->name = $_POST["name"];
	$user->description = $_POST["description"];
	$user->duration = $_POST["duration"];

	$user->add();
	Core::alert("Diagrama agregado!");
	Core::redir("./?view=dias&opt=all");
}
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="upd"){
if(count($_POST)>0){
	$user = DiaData::getById($_POST["user_id"]);
	$user->name = $_POST["name"];
	$user->description = $_POST["description"];
	$user->duration = $_POST["duration"];
	$user->update();


	Core::alert("Diagrama actualizado!");
	Core::redir("./?view=dias&opt=all");
}
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
	$user = DiaData::getById($_GET["id"]);
	$user->del();
	Core::alert("Diagrama eliminado!");
	Core::redir("./?view=dias&opt=all");
}



?>