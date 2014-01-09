<!DOCTYPE html>
<html lang="es">
<head>
	<?php include_http_metas() ?>
	<?php include_metas() ?>
	<?php include_title() ?>
	<link rel="shortcut icon" href="/favicon.ico" />
	<?php include_stylesheets() ?>
	<?php include_javascripts() ?>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div id="wrap">
		<div class="container">
			<?php echo $sf_content ?>
		</div>
	</div>

	<div id="footer">
		<div class="container">
		<p class="text-muted text-right">Desarrollado por <a href="http://www.kinesys.cl/">Kinesys</a> 
			| Colaboraci&oacute;n de <a href="http://www.davoscript.cl/">DavoScript</a></p>
		</div>
	</div>
</body>
</html>
