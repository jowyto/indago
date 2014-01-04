<h1><?php echo $dataset ?></h1>

<h2>Origen de dato</h2>
<div class="row">
	<div class="col-sm-8">
		<span class="glyphicon glyphicon-globe"></span>
		<a href="<?php echo $dataset->getUrl() ?>"><?php echo $dataset->getUrl() ?></a>
	</div>
	<div class="col-sm-2">
		<span class="glyphicon glyphicon-file"></span>
		<?php echo $dataset->getFormato() ?>
	</div>

	<?php if ($dataset->getCompresionId()): ?>
	<div class="col-sm-2">
		<span class="glyphicon glyphicon-compressed"></span>
		<?php echo $dataset->getCompresion() ?>
	</div>
	<?php endif ?>
</div>
<div class="row">
	<div class="col-sm-12">
		<h3>Cabeceras</h3>
		<p><?php echo $dataset->getCabeceras() ?></p>
	</div>
</div>

<h2>Descripci&oacute;n</h2>
<div class="row">
	<div class="col-sm-12">
		<p><?php echo $dataset->getDescripcion() ?></p>
	</div>
</div>

<h2>Etiquetas</h2>
<div class="row">
	<div class="col-sm-12">
		<p><?php echo $dataset->getTags() ?></p>
	</div>
</div>
