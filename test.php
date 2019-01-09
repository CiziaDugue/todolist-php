<?php
$pwd = 'thd41sn';
echo $pwd;
echo '<br>';
$hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
echo $hashed_pwd;
echo '<br>';
//$pwd = 0;
if (password_verify($pwd, $hashed_pwd)){
	echo 'Mot de passe vérifé';
}
else {
	echo 'Mot de passe non vérifé';
}