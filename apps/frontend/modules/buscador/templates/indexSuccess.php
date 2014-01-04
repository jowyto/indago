<!-- Jumbotron -->
<div class="jumbotron text-center">
	<h1>INDAGO</h1>
	<p class="lead">INdexador de Datos de Gobierno :: Buscador de Datos P&uacute;blicos</p>
	
	<form id="buscador" class="form-inline" role="form" method="post" action="#">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Ej: quiebras por a&ntilde;o, valorizaci&oacute;n fondos mutuos, establecimientos educacionales" 
			name="query" id="query" size="100" />
			<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery( "#query" ).autocomplete({
					source: function( request, response ) {
						jQuery.ajax({
							url: "<?php echo url_for('buscador/buscar') ?>",
							dataType: "jsonp",
							data: {
								query: request.term
							},
							success: function( data ) {
								response( jQuery.map( data, function( item ) {
									return {
										label: item.value,
										value: item.value,
										id: item.id
									}
								}));
							}
						});
					},
					minLength: 3,
					select: function( event, ui ) {
						jQuery.ajax({
							url: "<?php echo url_for('dataset/preview') ?>",
							data: {id: ui.item.id},
							success: function(data){
								jQuery('#result').html(data);
							}
						});
					}
				});
			});
			</script>
		</div>
		<div class="form-group">
			<input type="submit" class="form-control btn btn-success" value="buscar" />
		</div>
	</form>
</div>

<div id="result"></div>

<!-- Example row of columns -->
<div class="row">
	<div class="col-sm-3 text-justify">
		<h2>Datos abiertos</h2>
		<p><strong>Indago</strong> tiene como proposito recopilar en <strong>un solo buscador</strong> 
		la ubicaci&oacute;n de los distintos conjuntos de <strong>datos p&uacute;blicos</strong> que 
		exponen los diferentes <strong>Ministerios o Servicios del Gobierno y Estado de Chile</strong></p>
	</div>
	<div class="col-sm-3 text-justify">
		<h2>&iquest;Y para qu&eacute;?</h2>
		<p>Con estas datos podr&aacute;s generar informaci&oacute;n &uacute;til para ti y/o tu comunidad,
		monitorear la actividad de la autoridad, crear aplicaciones que ayuden a otros, y mucho m&aacute;s!</p>
	</div>
	<div class="col-sm-3 text-justify">
		<h2>Quiero aportar!</h2>
		<p>Si sabes de datos que no están en nuestra base ayudanos a encontrarla ;)</p>
		<p class="text-center">
			<button id="btnNuevo" class="btn btn-primary"
				data-toggle="modal" data-target="#myModal" href="<?php echo url_for('buscador/nuevo') ?>">
				encontr&eacute; datos nuevos
			</button>
		</p>
	</div>
	<div class="col-sm-3">
		<h2>Muy Interesante</h2>
		<p>
			<ul>
				<li><a href="http://datos.gob.cl/">Portal de Datos P&uacute;blicos Gobierno</a></li>
				<li><a href="http://www.consejotransparencia.cl/">Consejo para la Transparencia</a></li>
				<li><a href="http://www.opendatalatinoamerica.org/">OpenData Latinoamerica</a></li>
			</ul>
		</p>
	</div>
</div>

<!-- ------------------- -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Modal title</h4>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->