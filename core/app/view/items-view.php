<?php 
if(isset($_GET["opt"]) && $_GET["opt"]=="new"):?>
<section class="container">
<div class="row">
	<div class="col-md-12">
	<h1>Agregar Tarea</h1>
	<br>
<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=items&opt=add" role="form">
  <input type="hidden" name="dia_id" value="<?php echo $_GET["dia_id"];?>">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Titulo*</label>
    <div class="col-md-6">
      <input type="text" name="title" class="form-control" id="name" placeholder="Titulo">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion*</label>
    <div class="col-md-6">
      <textarea name="description" required class="form-control" id="lastname" placeholder="Descripcion"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Inicio*</label>
    <div class="col-md-6">
      <input type="text" name="start" class="form-control" id="start" placeholder="Inicio (No. Dia inicio)">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fin*</label>
    <div class="col-md-6">
      <input type="text" name="finish" class="form-control" id="finish" placeholder="Fin (No. Dia Fin)">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Color*</label>
    <div class="col-md-6">
      <input type="color" name="color" class="form-control" id="color" placeholder="Color">
    </div>
  </div>



  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Tarea</button>
    </div>
  </div>
</form>
	</div>
</div>
</section>

<?php elseif(isset($_GET["opt"]) && $_GET["opt"]=="edit"):?>
<div class="container">
<?php $user = ItemData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar Tarea</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=items&opt=upd" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Titulo*</label>
    <div class="col-md-6">
      <input type="text" name="title" value="<?php echo $user->title;?>" class="form-control" id="name" placeholder="Titulo">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion*</label>
    <div class="col-md-6">
      <textarea name="description" value="<?php echo $user->description;?>" required class="form-control" id="description" placeholder="Descripcion"><?php echo $user->description; ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Inicio*</label>
    <div class="col-md-6">
      <input type="text" name="start" value="<?php echo $user->start; ?>" class="form-control" id="start" placeholder="Inicio (No. Dia inicio)">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fin*</label>
    <div class="col-md-6">
      <input type="text" name="finish" value="<?php echo $user->finish; ?>" class="form-control" id="finish" placeholder="Fin (No. Dia Fin)">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Color*</label>
    <div class="col-md-6">
      <input type="color" value="<?php echo $user->color; ?>" name="color" class="form-control" id="color" placeholder="Color">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Tarea</button>
    </div>
  </div>
</form>
	</div>
</div>
</div>

<?php endif; ?>