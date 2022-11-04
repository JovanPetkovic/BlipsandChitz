<?php

namespace Modules;

class Contact
{
    public function __construct($name, $email, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    public function pushToDB($db)
    {
        $result = $db->query("INSERT INTO kontakt (ime, email, poruka) VALUES ('$this->name', '$this->email', '$this->message')");
        if($result)
        {
            return "Success";
        }
        else
        {
            return $db->error;

        }
    }

}