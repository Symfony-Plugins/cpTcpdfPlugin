<?php

if (sfConfig::has('app_tcpdf_config_path')) {
	require_once sfConfig::get('app_tcpdf_config_path') . '/tcpdf_config.php';
}
else {
  require_once dirname(__FILE__).'/../lib/tcpdf_config.php';
}

?>