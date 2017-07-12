<?php

class user
{
    static public function validate($value)
    {
        $db = new DB();
        return $db->find("SELECT `hint` FROM `gethint` WHERE `hint` LIKE '%{$value}%' ")->fetch_all();
    }
}