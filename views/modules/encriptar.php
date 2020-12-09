<?php
$md5 = md5('admin');
$salt = '$2a$07$'.$md5.'$';
$passEncriptada = crypt('Admin123',$salt);
echo $passEncriptada;