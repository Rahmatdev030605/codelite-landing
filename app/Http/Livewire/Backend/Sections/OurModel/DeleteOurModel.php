<?php

namespace App\Http\Livewire\Backend\Sections\OurModel;

use App\Models\OurModel;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class DeleteOurModel extends Component
{

    public function delete($id)
    {
        try {
            $model = OurModel::findOrFail($id);
            $model->delete();

            session()->flash('success', 'Our Model has been deleted successfully.');
            return Redirect::route('admin.get-our-model');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Our Model: ' . $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.backend.sections.our-model.delete-our-model');
    }
}
