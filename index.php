<?php
include ("./Server.php");

$server = (new Server)
    ->setPassword("password")
    ->setUser("user")
    ->setUrl("host")
    ->setPort(22)
;

if (!$ssh2_connection = ssh2_connect($server->getUrl(), $server->getPort())) {
    throw new Exception("Could not connect via SSH2");
}
if (!ssh2_auth_password($ssh2_connection, $server->getUser(), $server->getPassword())) {
    throw new Exception("SSH2 login failed");
}
if (!$sftp_connection = ssh2_sftp($ssh2_connection)) {
    throw new Exception("SFTP connection could not be established");
}
