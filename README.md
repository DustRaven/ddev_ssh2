# Demo Repo for ssh2_connect issues
Linked to  [this](https://github.com/php/pecl-networking-ssh2/issues/63) issue in pecl-networking-ssh is an error when trying to connect to Ubuntu 22.04's SSH:

`ssh2_connect($host, $port)` leads to an exception:
```
PHP Warning:  ssh2_connect(): Error starting up SSH connection(-5): Unable to exchange encryption keys
```

### Reproducing the error
* Set up Ubuntu 22.04 with ssh
* add a system user, for example "sftpuser"
* in the /etc/ssh/sshd_config add the following:
  ```
  Subsystem       sftp    /usr/lib/openssh/sftp-server
  Match user sftpuser
    PasswordAuthentication yes # Only if you use a password, not recommended!
  ```
* Configure your sftp access credentials in index.php:
  ```php
  <?php
  include ("./Server.php");
  
  $server = (new Server)
    ->setPassword("password")
    ->setUser("user")
    ->setUrl("host")
    ->setPort(22)
  ;
  ```
* Run `ddev config` and then `ddev exec php -f index.php`