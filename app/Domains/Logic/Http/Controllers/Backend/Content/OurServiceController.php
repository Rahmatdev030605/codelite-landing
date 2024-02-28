<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Content;

use Livewire\Component;
use App\Http\Controllers\Controller;
use App\Http\Livewire\OurServiceTest;
use App\Models\OurService;
use App\Models\PageTypes;
use Livewire\WithFileUploads;

class OurServiceController extends Controller
{

    public function newOurService()
    {
        $types = PageTypes::all();
        return view('livewire.our-service-test', compact('types'));
    }

    public function getOurService()
    {
        return view('backend.layouts.content.ourService.ourService');
    }

    //     public function storeOurService(Request $request)
    //     {
    //         try {
    //             $validateData = $request->validate([
    //                 'page_type_id' => 'nullable',
    //                 'status' => 'nullable|boolean',
    //                 'title' => 'nullable|string|max:255',
    //                 'heading' => 'nullable|string|max:255',
    //                 'description' => 'nullable|string',
    //                 'description_second' => 'nullable|string',
    //                 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif,svg|max:2048',
    //                 'button_link' => 'nullable|string',
    //             ]);

    //             $service = new OurService();
    //             $service->fill($validateData);

    //             if ($request->hasFile('image')) {
    //                 $imagePath = $request->file('image')->store('public/image/ourServices');
    //                 $service->image = str_replace('public/', '', $imagePath);
    //             }

    //             $service->save();

    //             return redirect()->route('admin.get-our-service')->with('success', 'Our Service Added Successfully');
    //         } catch (\Throwable $th) {
    //             return redirect()->back()->with('error', 'Failed to Added Our Services',  $th->getMessage());
    //         }
    //     }

    //     public function editOurService($id)
    //     {
    //         $service = OurService::findOrFail($id);
    //         $types = pageTypes::all();

    //         if ($service) {
    //             if (Storage::exists('public/image/ourServices/' . basename($service->image))) {
    //                 $service->image = asset("storage/image/ourServices/" . basename($service->image));
    //             } elseif (Storage::exists('app/public/image/ourServices/' . basename($service->image))) {
    //                 $service->image = asset("storage/image/ourServices/" . basename($service->image));
    //             } elseif (file_exists(public_path("img/ourServices/" . basename($service->image)))) {
    //                 $service->image = asset("img/ourServices/" . basename($service->image));
    //             }
    //         }
    //         return view('backend.layouts.content.ourService.editOurService', compact('service', 'types'));
    //     }

    //     public function updateOurService(Request $request, $id)
    //     {
    //         try {
    //             $validateData = $request->validate([
    //                 'page_type_id' => 'nullable',
    //                 'status' => 'nullable|boolean',
    //                 'title' => 'nullable|string|max:255',
    //                 'heading' => 'nullable|string|max:255',
    //                 'description' => 'nullable|string',
    //                 'description_second' => 'nullable|string',
    //                 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif,svg|max:2048',
    //                 'button_link' => 'nullable|string',
    //             ]);

    //             $service = OurService::findOrFail($id);

    //             $service->fill($validateData);

    //             // Handle main image
    //             if ($request->hasFile('image')) {
    //                 $imagePath = $request->file('image')->store('public/image/ourServices');
    //                 if ($service->image) {
    //                     Storage::disk('public')->delete($service->image);
    //                 }
    //                 $service->image = str_replace('public/', '', $imagePath);
    //             }

    //             $service->save();

    //             return redirect()->route('admin.get-our-service')->with('success', 'Our Service Updated Successfully');
    //         } catch (\Throwable $th) {
    //             return redirect()->back()->with('error', 'Failed to Update Hero: ' . $th->getMessage());
    //         }
    //     }

    //     public function deleteOurService($id)
    //     {
    //         try {
    //             $service = OurService::findOrFail($id);

    //             if ($service->image) {
    //                 Storage::disk('public')->delete($service->image);
    //             }

    //             $service->delete();
    //             return redirect()->route('admin.get-our-service')->with('success', 'Our Service Deleted Successfully');
    //         } catch (\Exception $e) {
    //             return redirect()->back()->with('error', 'Failed to delete Hero: ' . $e->getMessage());
    //         }
    //     }
}
