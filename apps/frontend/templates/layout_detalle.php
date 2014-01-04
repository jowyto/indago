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
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo url_for('@homepage') ?>">INDAGO :: Indice de Datos Abiertos de Gobierno y Organizaciones</a>
			</div>
		</div>
	</div>
	<div class="container">
		<?php echo $sf_content ?>
	</div>
</body>
</html>