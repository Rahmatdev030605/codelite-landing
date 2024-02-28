<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Content;

use App\Http\Controllers\Controller;
use App\Models\OurPricing;
use App\Models\PageTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OurPricingController extends Controller
{
    public function getOurPricing(Request $request)
    {
        $publicImg = 'img/default/';
        $sort = $request->input('sort');
        $search = $request->input('search');
        $query = OurPricing::query();
        $perPage = $request->query('perPage', 10);
        $pageTypes = $request->input('page_type_id');

        // Apply page type filter
        if ($pageTypes) {
            $query->where('page_type_id', $pageTypes);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        // Apply sorting
        switch ($sort) {
            case 'ascending':
                $query->orderBy('heading')->orderBy('title')->orderBy('sub_heading');
                break;
            case 'descending':
                $query->orderByDesc('heading')->orderByDesc('title')->orderByDesc('sub_heading');
                break;
            case 'newest':
                $query->latest();
                break;
            case 'oldest':
                $query->oldest();
                break;
            default:
                $query->orderBy('heading');
                break;
        }

        // Paginate results
        $ours = $query->paginate($perPage);

        // Process images
        foreach ($ours as $our) {
            // Handling main image
            $imagePathStorage = 'public/image/ourPricing/' . basename($our->image);
            $imagePathPublic = public_path("img/ourPricing/" . basename($our->image));

            if (Storage::exists($imagePathStorage)) {
                $our->image = asset('storage/image/ourPricing/' . basename($our->image));
            } elseif (file_exists($imagePathPublic)) {
                $our->image = asset("img/ourPricing/" . basename($our->image));
            } else {
                $our->image = asset('storage/image/default-no-image.jpg');
            }
        }

        $pageTypes = PageTypes::all();

        $totalOur = $ours->total();

        $ours->appends($request->query());

        return view('backend.layouts.content.ourPricing.OurPricing', compact('ours', 'sort', 'search', 'pageTypes', 'totalOur'));
    }

    public function showOurPricing(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');
        $perPage = $request->query('perPage', 10);
        $pageTypes = PageTypes::all();

        $query = OurPricing::query();

        // Apply search filter
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('heading', 'like', '%' . $search . '%')
                    ->orWhere('sub_heading', 'like', '%' . $search . '%')
                    ->orWhere('title', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('page_type_id')) {
            $query->where('page_type_id', $request->input('page_type_id'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        switch ($sort) {
            case 'ascending':
                $query->orderBy('heading')->orderBy('title')->orderBy('sub_heading');
                break;
            case 'descending':
                $query->orderByDesc('heading')->orderByDesc('title')->orderByDesc('sub_heading');
                break;
            case 'newest':
                $query->latest();
                break;
            case 'oldest':
                $query->oldest();
                break;
            default:
                $query->orderBy('heading');
                break;
        }

        $ours = $query->paginate($perPage);

        foreach ($ours as $our) {
            $imagePathPublic = public_path("img/ourPricing/" . basename($our->image));
            $imagePathStorage = storage_path("app/public/image/ourPricing/" . basename($our->image));

            if (file_exists($imagePathPublic)) {
                $our->image = asset("img/ourPricing/" . basename($our->image));
            } elseif (file_exists($imagePathStorage)) {
                $our->image = asset("storage/image/ourPricing/" . basename($our->image));
            } else {
                $our->image = asset("img/default/default-no-image.jpg");
            }
        }

        $totalOur = $ours->total();

        $ours->appends($request->query());

        return view('backend.layouts.content.ourPricing.OurPricing', compact('ours', 'sort', 'search', 'totalOur', 'pageTypes'));
    }


    public function newOurPricing()
    {
        $types = PageTypes::all();
        return view('backend.layouts.content.ourPricing.newOurPricing', compact('types'));
    }

    public function storeOurPricing(Request $request)
    {
        try {
            $validateData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|in:active,not active',
                'title' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'sub_heading' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif,svg|max:2048',
                'button_link' => 'nullable|string',
            ]);

            $our = new OurPricing();
            $our->fill($validateData);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/image/ourPricing');
                $our->image = str_replace('public/', '', $imagePath);
            }

            $our->save();

            return redirect()->route('admin.get-our-pricing')->with('success', 'Our Pricing Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Added Our Pricing",  $th->getMessage());
        }
    }

    public function editOurPricing($id)
    {
        $our = OurPricing::findOrFail($id);
        $types = PageTypes::all();

        if ($our) {
            if (Storage::exists('public/image/ourPricing/' . basename($our->image))) {
                $our->image = asset("storage/image/ourPricing/" . basename($our->image));
            } elseif (Storage::exists('app/public/image/ourPricing/' . basename($our->image))) {
                $our->image = asset("storage/image/ourPricing/" . basename($our->image));
            } elseif (file_exists(public_path("img/ourPricing/" . basename($our->image)))) {
                $our->image = asset("img/ourPricing/" . basename($our->image));
            }
        }

        return view('backend.layouts.content.ourPricing.editOurPricing', compact('our', 'types'));
    }

    public function updateOurPricing(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'status' => 'nullable|in:active,not active',
                'title' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'sub_heading' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif,svg|max:2048',
                'button_link' => 'nullable|string',
            ]);

            $our = OurPricing::findOrFail($id);
            $our->fill($validateData);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/image/ourPricing');
                if ($our->image) {
                    Storage::disk('public')->delete($our->image);
                    $our->image = str_replace('public/', '', $imagePath);
                }
            }

            $our->save();

            return redirect()->route('admin.get-our-pricing')->with('success', 'Our Pricing Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Update Our Pricing " . $th->getMessage());
        }
    }

    public function deleteOurPricing($id)
    {
        try {
            $our = OurPricing::findOrFail($id);
            if ($our->image) {
                Storage::disk('public')->delete($our->image);
            }

            $our->delete();

            return redirect()->route('admin.get-our-pricing')->with('success', 'Our Pricing Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Delete Our Pricing " . $th->getMessage());
        }
    }
}
