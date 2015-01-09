<?php
/**
 * @package brick
 *
 * CSS - Minify and Join
 */

require('../../../../wp-load.php');

global $site_styles;

// define site styles
$cssFiles = $site_styles;
$buffer = "";
foreach ($cssFiles as $cssFile) {
  $buffer .= file_get_contents($cssFile);
}
$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
$buffer = str_replace(': ', ':', $buffer);
$buffer = str_replace(array("\r\n", "\r", "\n", "\t"), '', $buffer);
$buffer = ereg_replace(" {2,}", ' ',$buffer);
$buffer = str_replace(array('} '), '}', $buffer);
$buffer = str_replace(array('{ '), '{', $buffer);
$buffer = str_replace(array('; '), ';', $buffer);
$buffer = str_replace(array(', '), ',', $buffer);
$buffer = str_replace(array(' }'), '}', $buffer);
$buffer = str_replace(array(' {'), '{', $buffer);
$buffer = str_replace(array(' ;'), ';', $buffer);
$buffer = str_replace(array(' ,'), ',', $buffer);
ob_start("ob_gzhandler");
header('Cache-Control: public');
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 86400) . ' GMT');
header("Content-type: text/css");
echo( $buffer );
?>
