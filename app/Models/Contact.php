<?php

namespace app\Models;

class Contact
{
    private static $db;

    public function __construct($name, $email, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    public static function setDB($dBase)
    {
        Contact::$db = $dBase;
    }

    public function pushToDB()
    {
        $result = Contact::$db->query("INSERT INTO kontakt (ime, email, poruka) VALUES ('$this->name', '$this->email', '$this->message')");
        if($result)
        {
            return "Success";
        }
        else
        {
            return Contact::$db->error;

        }
    }

}