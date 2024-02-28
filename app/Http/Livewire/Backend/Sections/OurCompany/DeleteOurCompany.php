<?php

namespace App\Http\Livewire\Backend\Sections\OurCompany;

use App\Models\OurCompany;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class DeleteOurCompany extends Component
{

    public function delete($id)
    {
        try {
            $company = OurCompany::find($id);
            if ($company->image) {
                Storage::disk('public')->delete($company->image);
            }
            $company->delete();

            session()->flash('success', 'Our Company has been deleted successfully.');
            return Redirect::route('admin.get-our-company');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Our Company: ' . $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.backend.sections.our-company.delete-our-company');
    }
}
