<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    protected $uslov = true;
    public function index()
    {
        if ($this->uslov) {

            return view('contact');
        } else {
            echo 'Wrong page! Sorry try again!';
        }
    }

    public function showContact()
    {
        $allcontacts = Contact::all();

        return view('allContacts', ['allcontacts' => $allcontacts]);
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            "email" => "required",
            "name" => "required",
            "password" => "required|max:8"
        ]);

        Contact::create([
            "email" => $request->get("email"),
            "name" => $request->get("name"),
            "password" => $request->get("password")
        ]);

        return redirect('/');
    }

    public function deleteContact($contact)
    {
        $singleContact = Contact::where(['id' => $contact])->first();

        if ($singleContact === null) {
            abort(404, 'Kontakt nije pronađen.');
        }

        // Ako kontakt postoji, nastavi s brisanjem
        $singleContact->delete();

        return redirect()->back()->with('success', 'Kontakt je uspješno izbrisan.');
    }

    public function editContact($id)
    {


        $id = Contact::findOrFail($id);

        return view('edit-contact', ['id' => $id]);
    }

    public function updateContact(Request $request, $contact)
    {

        $contact = Contact::findOrFail($contact);

        $request->validate([
            "email" => "required",
            "name" => "required",
            "password" => "required"
        ]);

        $contact->email = $request->email;
        $contact->name = $request->name;
        $contact->password = $request->password;

        $contact->save();

        return redirect('admin/all-contacts');
    }
}
