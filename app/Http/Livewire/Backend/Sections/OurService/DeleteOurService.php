<?php

namespace App\Http\Livewire\Backend\Sections\OurService;

use App\Models\OurService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Storage;

class DeleteOurService extends Component
{
    public function delete($id)
    {
        try {
            $service = OurService::findOrFail($id);

            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }

            $service->delete();

            session()->flash('success', 'Our Service has been deleted successfully.');
            return Redirect::route('admin.get-our-service');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Our Service: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('backend.layouts.content.ourService.ourService');
    }
}

