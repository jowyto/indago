<div class="highlight">
	<h2><?php echo $dataset ?> <small><a href="<?php echo url_for('dataset/detalle?id='.$dataset->getId())?>">ver m&aacute;s</a></small></h2>

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
			<p><?php echo $dataset->getDescripcion() ?></p>
		</div>
	</div>

</div>