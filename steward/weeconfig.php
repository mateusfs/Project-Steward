<?php

define("FOLDER_BOLETO_IMG", "../../web/img/boleto/imagens");

$__jquery = "web/js/jquery-1.10.2.js";


$settings = array(

		'domain' => 'mateusfs.projetointetgrador.org'

		, 'debug' => TRUE

		//DEFAULT
		, 'default'	=> array(

				'head' => array(
						'title' => 'Steward'
						, 'description' => ''
						, 'keywords' => ''
				)
				, 'css' => array(
						'web/css/staff.css',
						'web/css/datepicker.css',
						'web/css/helper_popupajax.css',
						'web/css/colorpicker.css',
						'web/css/jquery-ui-1.10.4.custom.css',
						'web/css/jquery-ui-1.10.4.custom.min.css',
						'web/css/metro-bootstrap.css',
						'web/css/iconFont.css'
				)
				, 'javascript' => array(
						$__jquery
						, 'web/js/jquery-ui-1.10.4.custom.js'
						, 'web/js/jquery-ui-1.10.4.custom.min.js'
						, 'web/js/jquery.ui.datepicker-pt-BR.js'
						, 'web/js/jquery.autocomplete.js'
						, 'web/js/funcoes.js'
						, 'web/js/staff.js'
						, 'web/js/appFunctions.js'
						, 'web/js/colorpicker.js'
						, 'web/js/jquery.cookie.js'
						, 'web/js/jquery.min.js'
						, 'web/js/jquery.widget.min.js'
						, 'web/js/metro.min.js'
						, 'web/js/metro-dropdown.js'
						, 'web/js/metro-input-control.js'
						, 'web/js/metro-calendar.js'
						, 'web/js/metro-datepicker.js'
						, 'web/js/metro-fluentmenu.js'
						, 'web/js/metro-accordion.js'
						, 'web/js/metro-slider.js'
						, 'web/js/Alerta.js'
						, 'web/js/jquery.maskMoney.js'
				)
		)

		//DEFAULT
		, 'adm'	=> array(

				'head' => array(
						'title' => 'Administrador'
						, 'description' => ''
						, 'keywords' => ''
				)
				, 'css' => array(
						'web/css/staff.css',
						'web/css/datepicker.css',
						'web/css/helper_popupajax.css',
						'web/css/colorpicker.css',
						'web/css/jquery-ui-1.10.4.custom.css',
						'web/css/jquery-ui-1.10.4.custom.min.css',
						'web/css/bootstrap-responsive.min.css',
						'web/css/bootstrap-responsive.css',
						'web/css/bootstrap.min.css',
				)
				, 'javascript' => array(
						$__jquery
						, 'web/js/jquery-ui-1.10.4.custom.js'
						, 'web/js/jquery-ui-1.10.4.custom.min.js'
						, 'web/js/jquery.ui.datepicker-pt-BR.js'
						, 'web/js/jquery.autocomplete.js'
						, 'web/js/funcoes.js'
						, 'web/js/staff.js'
						, 'web/js/appFunctions.js'
						, 'web/js/colorpicker.js'
						, 'web/js/colorpicker.js'
						, 'web/js/bootstrap.min.js'

				)
		)
);
