<?php

function get_safe_value($con, $str)
{
	if ($str != '') {
		$str = trim($str);
		return mysqli_real_escape_string($con, $str);
	}
}
function stripslashes_deep($value)
{
	$value = is_array($value) ?
				array_map('stripslashes_deep', $value) :
				stripslashes($value);

	return $value;
}
function redirect($path)
{
?>
	<script>
		window.location.href = '<?php echo $path; ?>';
	</script>
<?php
}

function encryptid($id)
{
	$ciphering = "AES-128-CTR";
	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 0;
	$encryption_iv = '1234567891011121';
	$key = "1top8ku";
	$encryption = openssl_encrypt($id, $ciphering, $key, $options, $encryption_iv);
	return $encryption;
}
function decryptid($id)
{
	$ciphering = "AES-128-CTR";
	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 0;
	$decryption_iv = '1234567891011121';
	$key = "1top8ku";
	$decryption = openssl_decrypt($id, $ciphering, $key, $options, $decryption_iv);
	return $decryption;
}


?>