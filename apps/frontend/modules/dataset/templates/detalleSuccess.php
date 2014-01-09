<h1><?php echo $dataset ?></h1>

<div class="row">
	<div class="col-sm-7">
		<a class="dataset_url" href="<?php echo $dataset->getUrl() ?>">
			<span class="glyphicon glyphicon-globe"></span>
			<?php echo $dataset->getUrl() ?>
		</a>
	</div>

	<div class="col-sm-1">
		<span class="glyphicon glyphicon-file"></span>
		<?php echo $dataset->getFormato() ?>
	</div>

	<div class="col-sm-1">
	<?php if ($dataset->getCompresionId()): ?>
		<span class="glyphicon glyphicon-compressed"></span>
		<?php echo $dataset->getCompresion() ?>
	<?php endif ?>
	</div>

	<div class="col-sm-3">
		<?php $val = $dataset->getValoracion() ?>
		<div class="glyphicon glyphicon-star" style="float:left;line-height: 20px;"></div>
		<div class="valorizador" style="float:left;" data-average="<?php echo $val->getPromedio() ?>" data-id="<?php echo $dataset->getId() ?>"></div>
		<script type="text/javascript">
			jQuery(document).ready(function(){
			// more complex jRating call
			jQuery(".valorizador").jRating({
				bigStarsPath: '/js/rating/icons/stars.png',
				smallStarsPathString: '/js/rating/icons/small.png',
				phpPath: '<?php echo url_for('dataset/valorizador') ?>',
				step:true,
				length : 7, // nb of stars
				rateMax: 7,
				canRateAgain: false,
				onSuccess : function(){
					alert('Gracias : tu calificaci\xF3n ha sido registrada :)');
				}
			});
		});
		</script>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<h4>&nbsp;</h4>
		<p class="h4">
			<?php foreach (explode(',', $dataset->getTags()) as $tag): ?>
				<span class="label label-info"><?php echo trim(str_replace('"', '', $tag)) ?></span>	
			<?php endforeach ?>
		</p>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<h4>&nbsp;</h4>
		<blockquote><p><?php echo $dataset->getDescripcion() ?></p></blockquote>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<h3>Cabeceras</h3>
		<p>
		<?php if ($dataset->getCabeceras()): ?>
			<?php foreach (explode(',', $dataset->getCabeceras()) as $cabecera): ?>
				<span class="label label-default"><?php echo $cabecera ?></span>
			<?php endforeach ?>
		<?php else: ?>
			No se registran cabeceras
		<?php endif ?>
		</p>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<h3>Comentarios</h3>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=457777331016083";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		<div class="fb-comments" data-href="<?php echo sfContext::getInstance()->getRequest()->getUri(); ?>" data-numposts="10" data-colorscheme="light"></div>
	</div>
</div>
