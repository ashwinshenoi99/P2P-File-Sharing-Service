<?php

$host = 'localhost';
$username = 'user';
$password = 'pass';
$db = 'ncp';

$conn = mysqli_connect($host, $username, $password, $db);

if(!$conn) {
	die("ERROR: Database connectivity error");
}

// create table users (username varchar(32), password varchar(32), userid varchar(6), primary key(userid));
// create trigger userid before insert on users for each row set new.userid = substr(md5(new.username),1,6);
// create table files (filehash varchar(32), filename varchar(50), filepath varchar(50), senderid varchar(6), receiverid varchar(6), deleted varchar(1) default '0', primary key(filehash), foreign key(senderid) references users(userid), foreign key(receiverid) references users(userid));

?>
