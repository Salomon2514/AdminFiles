<?PHP
function nvl(&$var, $default="") {
/* if $var is undefined, return $default, otherwise return $var */

	return isset($var) ? $var : $default;
}
?>