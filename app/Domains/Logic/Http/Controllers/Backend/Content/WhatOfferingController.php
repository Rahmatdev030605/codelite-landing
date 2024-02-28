<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Content;

use App\Http\Controllers\Controller;
use App\Models\PageTypes;
use App\Models\WhatOffering;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WhatOfferingController extends Controller
{
    public function getWhatOffering(Request $request)
    {
        $publicImg = 'img/default/';
        $sort = $request->input('sort');
        $search = $request->input('search');
        $query = WhatOffering::query();
        $perPage = $request->query('perPage', 10);
        $pageTypes = $request->input('page_type_id');

        if ($pageTypes) {
            $query->where('page_type_id', $pageTypes);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        // Apply sorting
        switch ($sort) {
            case 'ascending':
                $query->orderBy('heading')->orderBy('title')->orderBy('sub_heading')->orderBy('desc');
                break;
            case 'descending':
                $query->orderByDesc('heading')->orderByDesc('title')->orderByDesc('sub_heading')->orderBy('desc');
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

        $whats = $query->paginate($perPage);

        foreach ($whats as $what) {
            $imagePathPublic = public_path("img/whatOffering/" . basename($what->image));
            $imagePathStorage = storage_path("app/public/image/whatOffering/" . basename($what->image));

            if (file_exists($imagePathPublic)) {
                $what->image = asset("img/whatOffering/" . basename($what->image));
            } elseif (file_exists($imagePathStorage)) {
                $what->image = asset("storage/image/whatOffering/" . basename($what->image));
            } else {
                $what->image = asset("img/default/default-no-image.jpg");
            }
        }

        $pageTypes = PageTypes::all();

        $totalWhat = $whats->total();

        $whats->appends($request->query());

        return view('backend.layouts.content.whatWhereOffering.what', compact('whats', 'sort', 'search', 'pageTypes', 'totalWhat'));
    }

    public function showWhatOffering(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');
        $perPage = $request->query('perPage', 10);
        $pageTypes = PageTypes::all();
        $query = WhatOffering::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('heading', 'like', '%' . $search . '%')
                    ->orWhere('sub_heading', 'like', '%' . $search . '%')
                    ->orWhere('desc', 'like', '%' . $search . '%')
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
                $query->orderBy('heading')->orderBy('title')->orderBy('sub_heading')->orderBy('desc');
                break;
            case 'descending':
                $query->orderByDesc('heading')->orderByDesc('title')->orderByDesc('sub_heading')->orderBy('desc');
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

        $whats = $query->paginate($perPage);

        foreach ($whats as $what) {
            $imagePathPublic = public_path("img/whatOffering/" . basename($what->image));
            $imagePathStorage = storage_path("app/public/image/whatOffering/" . basename($what->image));

            if (file_exists($imagePathPublic)) {
                $what->image = asset("img/whatOffering/" . basename($what->image));
            } elseif (file_exists($imagePathStorage)) {
                $what->image = asset("storage/image/whatOffering/" . basename($what->image));
            } else {
                $what->image = asset("img/default/default-no-image.jpg");
            }
        }

        $totalWhat = $whats->total();

        $whats->appends($request->query());

        return view('backend.layouts.content.whatWhereOffering.what', compact('whats', 'sort', 'search', 'totalWhat', 'pageTypes'));
    }

    public function newWhatOffering()
    {
        $types = PageTypes::all();
        return view('backend.layouts.content.whatWhereOffering.newWhat', compact('types'));
    }

    public function storeWhatOffering(Request $request)
    {
        try {
            $validateData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|in:active,not active',
                'title' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'sub_heading' => 'nullable|string',
                'desc' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif,svg|max:2048',
                'button_link' => 'nullable|string',
            ]);

            $what = new WhatOffering();
            $what->fill($validateData);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/image/whatOffering');
                $what->image = str_replace('public/', '', $imagePath);
            }

            $what->save();

            return redirect()->route('admin.get-what-offering')->with('success', "What We're Offering or Our Partners Added Successfully");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Added What We're Offering or Our Partners ",  $th->getMessage());
        }
    }

    public function editWhatOffering($id)
    {
        $what = WhatOffering::findOrFail($id);
        $types = PageTypes::all();

        if ($what) {
            if (Storage::exists('public/image/whatOffering/' . basename($what->image))) {
                $what->image = asset("storage/image/whatOffering/" . basename($what->image));
            } elseif (Storage::exists('app/public/image/whatOffering/' . basename($what->image))) {
                $what->image = asset("storage/image/whatOffering/" . basename($what->image));
            } elseif (file_exists(public_path("img/whatOffering/" . basename($what->image)))) {
                $what->image = asset("img/whatOffering/" . basename($what->image));
            }
        }
        return view('backend.layouts.content.whatWhereOffering.editWhat', compact('what', 'types'));
    }

    public function UpdateWhatOffering(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|in:active,not active',
                'title' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'sub_heading' => 'nullable|string',
                'desc' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif,svg|max:2048',
                'button_link' => 'nullable|string',
            ]);

            $what = WhatOffering::findOrFail($id);
            $what->fill($validateData);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/image/whatOffering');
                if ($what->image) {
                    Storage::disk('public')->delete($what->image);
                }
                $what->image = str_replace('public/', '', $imagePath);
            }

            $what->save();
            return redirect()->route('admin.get-what-offering')->with('success', "What We're Offering or Our Partners updated Successfully");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Update what We're offering or Our Partners " . $th->getMessage());
        }
    }

    public function deleteWhatOffering($id)
    {
        try {
            $what = WhatOffering::findOrFail($id);

            if ($what->image) {
                Storage::disk('public')->delete($what->image);
            }

            $what->delete();

            return redirect()->route('admin.get-what-offering')->with('success', "What We're Offering or Our Partners Deleted Successfully");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Update what We're offering or Our Partners " . $th->getMessage());
        }
    }
}
