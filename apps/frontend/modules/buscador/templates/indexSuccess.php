<!-- Jumbotron -->
<div class="jumbotron text-center" id="jumbotron">
	<h1 style="margin-top:0;"><img id="logoIndago" src="/images/logo.png" alt="Indago" width="50%" height="50%"/></h1>
	<p class="lead" id="leadText">Indexador de Datos de Gobierno y Organizaciones :: Buscador de Datos P&uacute;blicos</p>
	
	<form id="buscador" class="form-inline" role="form" method="post" action="#">
		<div class="form-group">
			<input type="text" class="form-control input-lg" 
				placeholder="Ej: quiebras por a&ntilde;o, valorizaci&oacute;n fondos mutuos, establecimientos educacionales" 
				name="query" id="query" size="100" tabindex="1"/>

			<script type="text/javascript">
			var achicado = false;
			jQuery(document).ready(function(){
				jQuery( "#query" ).focus();
				jQuery( "#query" ).autocomplete({
					source: function( request, response ) {
						jQuery.ajax({
							url: "<?php echo url_for('buscador/buscar') ?>",
							dataType: "jsonp",
							data: {
								query: request.term
							},
							success: function( data ) {
								/*response( jQuery.map( data, function( item ) {
									return {
										label: item.value,
										value: item.value,
										id: item.id
									}
								}));*/
								var tabla = jQuery('<table>')
									.addClass('table table-hover')
									.append(
										jQuery('<thead>').append(
											jQuery('<tr>')
												.append( jQuery('<th>').text('Documento') )
												.append( jQuery('<th>').text('Palabras Clave') )
												.append( jQuery('<th>').text('Acciones') )
										)
									);

								var valido = false;
								var body = jQuery('<tbody>');

								jQuery(data).each(function(i, item){
									if(item.id == 0) return;
									valido = true;

									tr = jQuery('<tr>')
										.append(
											jQuery('<td>')
												.text(item.title)
										).append(
											jQuery('<td>')
												.addClass('small')
												.text(item.tags)
									
										).append(
											jQuery('<td>')
												.addClass('acciones')
												.append(
													jQuery('<a>')
														.attr('href', item.url)
														.attr('title', 'Ir al archivo')
														.addClass('glyphicon glyphicon-globe')
												)
												.append(
													jQuery('<a>')
														.attr('href', '<?php echo url_for('dataset/detalle') ?>/id/'+item.id)
														.attr('title', 'Ver detalles')
														.addClass('glyphicon glyphicon-eye-open')
												)
										);

									body.append( tr );
								});

								tabla.append( body );

								if(valido){
									if(!achicado){
										jQuery('#jumbotron').animate({backgroundColor: '#fff', paddingBottom: '0'}, 'slow');
										jQuery('#logoIndago').animate({width: '35%', height: '35%'} ,'slow');
										jQuery('#leadText').animate({fontSize: '0.8em'}, 'slow');
										jQuery('#result').animate({backgroundColor: '#eaedf2', marginBottom: '4em'});
										achicado = true;
									}
									jQuery('#result').html(tabla);
								}
							}
						});
					},
					minLength: 5,
					/*select: function( event, ui ) {
						jQuery.ajax({
							url: "<?php echo url_for('dataset/preview') ?>",
							data: {id: ui.item.id},
							success: function(data){
								jQuery('#result').html(data);
							}
						});
					}*/
				});
			});
			</script>
		</div>
		<!--<div class="form-group">
			<input type="submit" class="form-control btn btn-success" value="buscar" />
		</div>-->
	</form>
</div>

<div id="result"></div>

<!-- Example row of columns -->
<div class="row" style="padding: 0 1.2em;">
	<div class="col-sm-3 text-justify barra_top_azul">
		<h2>Datos abiertos</h2>
		<p><strong>Indago</strong> tiene como proposito recopilar en <strong>un solo buscador</strong> 
		la ubicaci&oacute;n de los distintos conjuntos de <strong>datos p&uacute;blicos</strong> que 
		exponen los diferentes <strong>Ministerios o Servicios del Gobierno y Estado de Chile</strong></p>
	</div>
	<div class="col-sm-3 text-justify barra_top_roja">
		<h2>&iquest;Y para qu&eacute;?</h2>
		<p>Con estas datos podr&aacute;s generar informaci&oacute;n &uacute;til para ti y/o tu comunidad,
		monitorear la actividad de la autoridad, crear aplicaciones que ayuden a otros, y mucho m&aacute;s!</p>
	</div>
	<div class="col-sm-3 text-justify barra_top_azul">
		<h2>Quiero aportar!</h2>
		<p>Si sabes de datos que no están en nuestra base ayudanos a encontrarla ;)</p>
		<p class="text-center">
			<button id="btnNuevo" class="btn btn-primary"
				data-toggle="modal" data-target="#myModal" href="<?php echo url_for('buscador/nuevo') ?>">
				encontr&eacute; datos nuevos
			</button>
		</p>
	</div>
	<div class="col-sm-3 barra_top_roja">
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