<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Company\AboutUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company\AboutUs\Contact;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
     //*************PARTNER VIEW*************** */

     public function getAboutUsView(Request $request)
     {
         $aboutView = Contact::all();
         return view('backend.layouts.company.aboutUs.aboutView',compact('aboutView'));
 
     }
 
     //*************COMPANY CONTACT*************** */
     public function getContact(Request $request)
     {
        $contact = Contact::all();
         return view('backend.layouts.company.aboutUs.contact', compact('contact'));
     }
 
     public function storeContact(Request $request)
     {
         $request->validate([
             'no_telp_company' => 'required|max:15',
             'email_company' => 'required|max:255',
             'location_company' => 'required|max:1000',
         ]);
     
         $contact = new Contact;
     
         $contact->no_telp_company = $request->input('no_telp_company');
         $contact->email_company = $request->input('email_company');
         $contact->location_company = $request->input('location_company');
         $contact->save();
     
         return redirect()->route('admin.contact')->with('success', 'Contact Data successfully');
     }
     
 
     public function show(Request $request)
     {
        //
     }
 
     public function updateContact(Request $request, $id)
     {
         $request->validate([
            'no_telp_company' => 'required|max:15',
            'email_company' => 'required|max:255',
            'location_company' => 'required|max:1000',
         ]);
 
         $contact = Contact::find($id);
 
         if (!$contact) {
             return redirect()->route('admin.contact')->with('error', 'Partner not found');
         }
 
         $contact->no_telp_company = $request->input('no_telp_company');
         $contact->email_company = $request->input('email_company');
         $contact->location_company = $request->input('location_company');
         $contact->save();
 
         return redirect()->route('admin.contact')->with('success', 'Contact data updated successfully');
     }
 
     public function destroyContact($id) {
        $contact = Contact::find($id);
        $contact->delete();
    
        return redirect()->route('admin.contact')->with('success', 'Partner deleted successfully');
    }
}
