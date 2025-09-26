<?php

namespace App\Repositories;

use App\Models\Contact;


class ContactRepository
{

    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new Contact();
    }

    public function sendContact($request)
    {

        $this->contactModel->create([
            "email" => $request->get("email"),
            "name" => $request->get("name"),
            "password" => $request->get("password")
        ]);
    }
}
