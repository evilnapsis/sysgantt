<?php
if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
if(count($_POST)>0){
	$user = new ItemData();
	$user->title = $_POST["title"];
	$user->description = $_POST["description"];
	$user->start = $_POST["start"];
	$user->finish = $_POST["finish"];
	$user->dia_id = $_POST["dia_id"];
	$user->color = $_POST["color"];

	$user->add();
	Core::alert("Tarea agregada!");
	Core::redir("./?view=dias&opt=view&id=".$_POST["dia_id"]);
}
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="upd"){
if(count($_POST)>0){
	$user = ItemData::getById($_POST["user_id"]);
	$user->title = $_POST["title"];
	$user->description = $_POST["description"];
	//$user->duration = $_POST["duration"];
	$user->start = $_POST["start"];
	$user->finish = $_POST["finish"];


	$user->color = $_POST["color"];

	$user->update();


	Core::alert("Tarea actualizada!");
	Core::redir("./?view=dias&opt=view&id=".$user->dia_id);
}
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
	$user = ItemData::getById($_GET["id"]);
	$user->del();
	Core::alert("Tarea eliminada!");
	Core::redir("./?view=dias&opt=view&id=".$user->dia_id);
}



?>