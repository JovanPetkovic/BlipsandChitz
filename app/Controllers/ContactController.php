<?php

namespace app\Controllers;

use app\Models\Contact;
use http\Header;

class ContactController
{
    public static function addContact()
    {
        $contact = new Contact($_POST['name'], $_POST['email'], $_POST['text']);
        echo $contact->pushToDB();
    }

    public static function showForm()
    {
        include_once "../Templates/Contact.html";
    }


}