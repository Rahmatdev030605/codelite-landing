<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Content;

use App\Http\Controllers\Controller;
use App\Models\OurTrueWord;
use App\Models\PageTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OurTrueWordController extends Controller
{
    public function getOurTrue(Request $request)
    {
        $publicImg = 'img/default/';
        $sort = $request->input('sort');
        $search = $request->input('search');
        $query = OurTrueWord::query();
        $perPage = $request->query('perPage', 10);
        $pageTypes = $request->input('page_type_id');

        if ($pageTypes) {
            $query->where('page_type_id', $pageTypes);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }


        switch ($sort) {
            case 'ascending':
                $query->orderBy('heading')->orderBy('title')->orderBy('sub_heading')->orderBy('desc_1')->orderBy('desc_2');
                break;
            case 'descending':
                $query->orderByDesc('heading')->orderByDesc('title')->orderBy('sub_heading')->orderByDesc('desc_1')->orderBy('desc_2');
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
            $imagePathPublic = public_path("img/ourTrue/" . basename($our->image));
            $imagePathStorage = storage_path("app/public/image/ourTrue/" . basename($our->image));

            if (file_exists($imagePathPublic)) {
                $our->image = asset("img/ourTrue/" . basename($our->image));
            } elseif (file_exists($imagePathStorage)) {
                $our->image = asset("storage/image/ourTrue/" . basename($our->image));
            } else {
                $our->image = asset("img/default/default-no-image.jpg");
            }
        }

        $pageTypes = PageTypes::all();
        $totalOur = $ours->total();
        $ours->appends($request->query());

        return view('backend.layouts.content.ourTrue.ourTrue', compact('ours', 'sort', 'search', 'pageTypes', 'totalOur'));
    }

    public function showOurTrue(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');
        $perPage = $request->query('perPage', 10);
        $pageTypes = PageTypes::all();
        $query = OurTrueWord::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('heading', 'like', '%' . $search . '%')
                    ->orWhere('sub_heading', 'like', '%' . $search . '%')
                    ->orWhere('desc_1', 'like', '%' . $search . '%')
                    ->orWhere('desc_2', 'like', '%' . $search . '%')
                    ->orWhere('title', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('status')) {
            $status = $request->input('status');
            $query->where('status', $status);
        }

        if ($request->filled('page_type_id')) {
            $pageTypeId = $request->input('page_type_id');
            $query->where('page_type_id', $pageTypeId);
        }

        switch ($sort) {
            case 'ascending':
                $query->orderBy('heading')->orderBy('title')->orderBy('sub_heading')->orderBy('desc_1')->orderBy('desc_2');
                break;
            case 'descending':
                $query->orderByDesc('heading')->orderByDesc('title')->orderByDesc('sub_heading')->orderBy('desc_1')->orderBy('desc_2');
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
            $imagePathPublic = public_path("img/ourTrue/" . basename($our->image));
            $imagePathStorage = storage_path("app/public/image/ourTrue/" . basename($our->image));

            if (file_exists($imagePathPublic)) {
                $our->image = asset("img/ourTrue/" . basename($our->image));
            } elseif (file_exists($imagePathStorage)) {
                $our->image = asset("storage/image/ourTrue/" . basename($our->image));
            } else {
                $our->image = asset("img/default/default-no-image.jpg");
            }
        }

        $totalOur = $ours->total();

        $ours->appends($request->query());

        return view('backend.layouts.content.ourTrue.ourTrue', compact('ours', 'sort', 'search', 'totalOur', 'pageTypes'));
    }



    public function newOurTrue()
    {
        $types = PageTypes::all();
        return view('backend.layouts.content.ourTrue.newOurTrue', compact('types'));
    }

    public function storeOurTrue(Request $request)
    {
        try {
            $validateData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|in:active,not active',
                'title' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'sub_heading' => 'nullable|string',
                'desc_1' => 'nullable|string',
                'desc_2' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif,svg|max:2048',
                'button_link' => 'nullable|string',
            ]);

            $our = new OurTrueWord();
            $our->fill($validateData);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/image/ourTrue');
                $our->image = str_replace('public/', '', $imagePath);
            }

            $our->save();

            return redirect()->route('admin.get-our-true')->with('success', 'Our True Word Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Added Our True Word",  $th->getMessage());
        }
    }

    public function editOurTrue($id)
    {
        $our = OurTrueWord::findOrFail($id);
        $types = PageTypes::all();

        if ($our) {
            if (Storage::exists('public/image/ourTrue/' . basename($our->image))) {
                $our->image = asset("storage/image/ourTrue/" . basename($our->image));
            } elseif (Storage::exists('app/public/image/ourTrue/' . basename($our->image))) {
                $our->image = asset("storage/image/ourTrue/" . basename($our->image));
            } elseif (file_exists(public_path("img/ourTrue/" . basename($our->image)))) {
                $our->image = asset("img/ourTrue/" . basename($our->image));
            }
        }

        return view('backend.layouts.content.ourTrue.editOurTrue', compact('our', 'types'));
    }

    public function updateOurTrue(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|in:active,not active',
                'title' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'sub_heading' => 'nullable|string',
                'desc_1' => 'nullable|string',
                'desc_2' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif,svg|max:2048',
                'button_link' => 'nullable|string',
            ]);

            $our = OurTrueWord::findOrFail($id);
            $our->fill($validateData);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/image/ourTrue');
                if ($our->image) {
                    Storage::disk('public')->delete($our->image);
                    $our->image = str_replace('public/', '', $imagePath);
                }
            }

            $our->save();

            return redirect()->route('admin.get-our-true')->with('success', ' Our True Word Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Update Our True Word " . $th->getMessage());
        }
    }

    public function deleteOurTrue($id)
    {
        try {
            $our = OurTrueWord::findOrFail($id);
            if ($our->image) {
                Storage::disk('public')->delete($our->image);
            }

            $our->delete();

            return redirect()->route('admin.get-our-true')->with('success', 'Our True Word Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Delete Our True Word" . $th->getMessage());
        }
    }
}
