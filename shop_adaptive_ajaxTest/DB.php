<?php

class DB
{
    public $link;
    const DB_HOST = '127.0.0.1';
    const DB_USER = 'root';
    const DB_PASSWORD = '';
    const DB_NAME = 'ajax';

    public function __construct()
    {
        $this->link = new mysqli(self::DB_HOST, self::DB_USER, self::DB_PASSWORD, self::DB_NAME);
    }

    public function find($sql)
    {
        return $query = $this->link->query($sql);
    }
}