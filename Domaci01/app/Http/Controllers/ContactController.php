<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{


    private $contactRepo;

    public function __construct()
    {

        $this->contactRepo = new ContactRepository();
    }

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

    public function sendContact(SendContactRequest $request)
    {
        $request->validated();

        $this->contactRepo->sendContact($request);

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

    public function updateContact(UpdateContactRequest $request, $contact)
    {

        $contact = Contact::findOrFail($contact);

        $request->validated();

        $contact->email = $request->email;
        $contact->name = $request->name;
        $contact->password = $request->password;

        $contact->save();

        return redirect('admin/all-contacts');
    }
}
