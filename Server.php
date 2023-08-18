<?php

class Server {
    private string $user = "";
    private string $password = "";
    private string $url = "";
    private int $port = 22;

    public function setUser(string $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setPort(int $port): self
    {
        $this->port = $port;
        return $this;
    }

    public function getPort(): int
{
    return $this->port;
}
}
