<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">Ingresa Nuevos Datos</h4>
		</div>
		<div class="modal-body">
			<form id="formNuevo" action="<?php echo url_for('buscador/nuevo') ?>" method="post" class="form" role="form">
				<?php echo $form->renderGlobalErrors() ?>

				<div class="form-group">
					<label for="dataset_dataset">Nombre</label>
					<?php echo $form['dataset']->render(array('class'=>'form-control')) ?>
					<?php echo $form['dataset']->renderError() ?>
				</div>

				<div class="form-group">
					<label for="dataset_url">URL</label>
					<?php echo $form['url']->render(array('class'=>'form-control')) ?>
					<?php echo $form['url']->renderError() ?>
					<span class="help-block">Ej: http://datastorage.mineduc.cl/tablas/Establecimiento_DotacionAsistentes.csv</span>
				</div>

				<div class="form-group">
					<label for="dataset_descripcion">Descripci&oacute;n</label>
					<?php echo $form['descripcion']->render(array('class'=>'form-control')) ?>
					<?php echo $form['descripcion']->renderError() ?>
					<span class="help-block">Ej: Contiene indicadores para n&uacute;mero de asistentes 
					de la educaci&oacute;n y jornada (horas semanales). Cada fila de la tabla 
					corresponde a un A&ntilde;o/Establecimiento.</span>
				</div>

				<div class="form-group">
					<label for="dataset_tags">Etiquetas</label>
					<?php echo $form['tags']->render(array('class'=>'form-control')) ?>
					<?php echo $form['tags']->renderError() ?>
					<span class="help-block">Palabras claves que ayudan a identificar el contenido.<br/>
					Separados por coma. Ej: "educación", "asistentes"</span>
				</div>

				<div class="form-group">
					<label for="dataset_formato_id">Formato</label>
					<?php echo $form['formato_id']->render(array('class'=>'form-control')) ?>
					<?php echo $form['formato_id']->renderError() ?>
				</div>

				<div class="form-group">
					<label for="dataset_compresion_id">Compresi&oacute;n</label>
					<?php echo $form['compresion_id']->render(array('class'=>'form-control')) ?>
					<?php echo $form['compresion_id']->renderError() ?>
				</div>

				<div class="form-group">
					<label for="dataset_cabeceras">Cabeceras</label>
					<?php echo $form['cabeceras']->render(array('class'=>'form-control')) ?>
					<?php echo $form['cabeceras']->renderError() ?>
					<span class="help-block">Si los datos están tabulados (tablas, xls, csv) por favor
					especifica el nombre de las columnas.</span>
				</div>

				<?php echo $form->renderHiddenFields() ?>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="button" class="btn btn-primary" id="btnNuevoGuardar">Guardar</button>
		</div>
	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script type="text/javascript">
jQuery(document).ready(function(){

	jQuery('#formNuevo').on('submit', function(e){
		e.preventDefault();

		jQuery.post(
			jQuery(this).attr('action'),
			jQuery(this).serialize(),
			function(data){
				jQuery('#myModal').html(data);
			}
		).fail(function(data){
			alert('hubo un problema -_-');
			console.log(data);
		});

		return false;
	});

	jQuery('#btnNuevoGuardar').on('click', function(e){
		e.preventDefault();
		jQuery('#formNuevo').submit();
	});

});
</script>