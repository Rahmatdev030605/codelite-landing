<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Services;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service\Service;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getService(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');
        $publicImg = 'img/service/';

        $query = Service::query();


        $services = $query->paginate(9);

        foreach ($services as $service) {
            $imagePathStorage = 'public/image/service/' . basename($service->service_image);
            $imagePathPublic = public_path("img/service/" . basename($service->service_image));

            if (Storage::exists($imagePathStorage)) {
                $service->service_image = asset('storage/image/service/' . basename($service->service_image));
            } elseif (file_exists($imagePathPublic)) {
                $service->service_image = asset("img/service/" . basename($service->service_image));
            } else {
                $service->service_image = asset('storage/image/default-no-image.jpg');
            }
        }
        return view('backend.layouts.company.service.service', compact('services', 'sort', 'search'));
    }

    public function showService(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');

        $services = Service::query();

        if ($search) {
            $services->where('service_name', 'like', '%' . $search . '%');
        }

        if ($sort) {
            switch ($sort) {
                case 'ascending':
                    $services->orderBy('service_name');
                    break;
                case 'descending':
                    $services->orderByDesc('service_name');
                    break;
                case 'newest':
                    $services->latest();
                    break;
                case 'oldest':
                    $services->oldest();
                    break;
                default:
                    $services->orderBy('service_name');
                    break;
            }
        }

        $services = $services->paginate(10);

        return view('backend.layouts.services.service', compact('services', 'sort', 'search'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'service_name' => 'required|string|max:255',
                'service_image' => 'image|mimes:jpeg,png,jpg,gif,avif,svg|max:2048',
                'service_desc' => 'required|string',
            ]);

            $service = new Service();
            $service->service_name = $validatedData['service_name'];
            $service->service_desc = $validatedData['service_desc'];

            if ($request->hasFile('service_image')) {
                $serviceImage = $request->file('service_image');
                $serviceImageName = Uuid::uuid4() . $serviceImage->getClientOriginalName();
                $serviceImagePath = '/img/service/' . $serviceImageName;
                $serviceImage->move(public_path('img/service'), $serviceImageName);
                $service->service_image = $serviceImagePath;
            }

            if ($service->save()) {
                return redirect()->route('admin.service')->with('success', 'Service Added Successfully');
            } else {
                return redirect()->back()->with('error', 'Failed to save service');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */





    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $validatedData =  $request->validate([
                'service_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'service_name' => 'string|max:255',
                'service_desc' => 'string',
            ]);

            $service = Service::findOrFail($id);

            $service->fill($validatedData);

            if ($request->hasFile('service_image')) {
                $subImagePath = $request->file('service_image')->store('public/image/hero');
                if ($service->service_image) {
                    Storage::disk('public')->delete($service->service_image);
                }
                $service->service_image = str_replace('public/', '', $subImagePath);
            }

            $service->save();
            return redirect()->route('admin.service')->with('success', 'Service updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to Update Service: ' . $th->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services = Service::find($id);

        if ($services->service_image) {
            Storage::disk('public')->delete($services->service_image);
        }

        $services->delete();

        return redirect()->route('admin.service', compact('services'))->with('success', 'Service deleted successfully');
    }
}
