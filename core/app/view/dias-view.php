<?php 

if(isset($_GET["opt"]) && $_GET["opt"]=="all"):?>
<section class="container">
<div class="row">
	<div class="col-md-12">
		<h1>Mis Diagramas</h1>
	<a href="index.php?view=dias&opt=new" class="btn btn-default"><i class='fa fa-asterisk'></i> Nuevo</a>
<br><br>
		<?php
		$users = DiaData::getAll();
		if(count($users)>0){
			?>
			<div class="box box-primary">
			<table class="table table-bordered datatable table-hover">
			<thead>
      <th></th>
			<th>Nombre </th>
			<th>Descripcion</th>
      <th>Duracion</th>
      <th>Creacion</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
          <td style="width: 100px; ">
  <a href="index.php?view=dias&opt=view&id=<?php echo $user->id; ?>" class="btn btn-default btn-xs"><i class='fa fa-sitemap'></i> Ver diagrama</a>

          </td>
				<td><?php echo $user->name; ?></td>
				<td><?php echo $user->description; ?></td>
        <td><?php echo $user->duration; ?></td>
        <td><?php echo $user->created_at; ?></td>
				<td style="width:120px;">
				<a href="index.php?view=dias&opt=edit&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?action=dias&opt=del&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
				</td>
				</tr>
				<?php

			}
 echo "</table></div>";

		}else{
			?>
			<p class="alert alert-warning">No hay Diagramas.</p>
			<?php
		}

		?>

	</div>
</div>
</section>
<?php elseif(isset($_GET["opt"]) && $_GET["opt"]=="new"):?>
<section class="container">
<div class="row">
	<div class="col-md-12">
	<h1>Agregar Diagrama</h1>
	<br>
<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=dias&opt=add" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion*</label>
    <div class="col-md-6">
      <textarea name="description" required class="form-control" id="lastname" placeholder="Descripcion"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Duracion*</label>
    <div class="col-md-6">
      <input type="text" name="duration" class="form-control" id="duration" placeholder="Duracion (Total de Dias/Semanas/Meses)">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Diagrama</button>
    </div>
  </div>
</form>
	</div>
</div>
</section>

<?php elseif(isset($_GET["opt"]) && $_GET["opt"]=="edit"):?>
<div class="container">
<?php $user = DiaData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar Diagrama</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=dias&opt=upd" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion*</label>
    <div class="col-md-6">
      <textarea name="description" value="<?php echo $user->description;?>" required class="form-control" id="description" placeholder="Descripcion"><?php echo $user->description; ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Duracion*</label>
    <div class="col-md-6">
      <input type="text" name="duration" value="<?php echo $user->duration;?>" class="form-control" id="duration" placeholder="Duracion">
    </div>
  </div>



  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Diagrama</button>
    </div>
  </div>
</form>
	</div>
</div>
</div>
<?php elseif(isset($_GET["opt"]) && $_GET["opt"]=="view"):
$dia = DiaData::getById($_GET["id"]);
  ?>

<section class="container">
<div class="row">
  <div class="col-md-12">
    <h1><?php echo $dia->name; ?><small> Ver Diagrama</small> </h1>
  <a href="index.php?view=items&opt=new&dia_id=<?php echo $dia->id; ?>" class="btn btn-default"><i class='fa fa-asterisk'></i> Nueva tarea</a>
<br><br>
    <?php
    $users = ItemData::getAllByDia($dia->id);
    if(count($users)>0){
      ?>
      <div class="box box-primary">
        <div style="overflow-x: scroll; ">
      <table class="table table-bordered datatable table-hover" style="width: auto; " >
      <thead>
      <th></th>
      <th>Nombre </th>
      <?php for($i=1; $i<=$dia->duration; $i++):?>
      <th><?php echo $i;?></th>
    <?php endfor; ?>
      </thead>
      <?php
      foreach($users as $user){
        ?>
        <tr>
          <td style="width: 70px; display: inline-block;  ">
  <a href="index.php?view=items&opt=edit&id=<?php echo $user->id; ?>" class="btn btn-warning btn-xs"><i class='fa fa-pencil'></i></a>
  <a href="index.php?action=items&opt=del&id=<?php echo $user->id; ?>" class="btn btn-danger btn-xs"><i class='glyphicon glyphicon-remove'></i></a>

          </td>
        <td style=""><?php echo substr($user->title, 0, 8);; ?></td>

      <?php for($i=1; $i<=$dia->duration; $i++):?>
        <td style="width:10px; <?php if($user->start<=$i && $user->finish >=$i){ echo "background: $user->color; "; }?>">
        </td>
    <?php endfor; ?>
        </tr>
        <?php

      }
 echo "</table></div></div>";

    }else{
      ?>
      <p class="alert alert-warning">No hay Tareas.</p>
      <?php
    }

    ?>

  </div>
</div>
</section>
<?php endif; ?>