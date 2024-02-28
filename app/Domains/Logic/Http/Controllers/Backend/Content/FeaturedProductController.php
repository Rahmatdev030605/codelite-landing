<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Content;

use App\Http\Controllers\Controller;
use App\Models\FeaturedProduct;
use App\Models\PageTypes;
use Illuminate\Http\Request;

class FeaturedProductController extends Controller
{
    public function getFeatured(Request $request)
    {

        $sort = $request->input('sort');
        $search = $request->input('search');
        $query = FeaturedProduct::query();
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

        $features = $query->paginate($perPage);

        $pageTypes = PageTypes::all();

        $totalFeature = $features->total();

        $features->appends($request->query());


        return view('backend.layouts.content.featuredProduct.featured', compact('features', 'totalFeature', 'sort', 'search', 'pageTypes', 'totalFeature'));
    }

    public function showFeatured(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');
        $query = FeaturedProduct::query();
        $perPage = $request->query('perPage', 10);
        $pageTypes = PageTypes::all();

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

        $features = $query->paginate($perPage);
        $totalFeature = $features->total();
        $features->appends($request->query());
        return view('backend.layouts.content.featuredProduct.featured', compact('features', 'totalFeature', 'sort', 'search', 'pageTypes'));
    }

    public function newFeatured()
    {
        $types = PageTypes::all();
        return view('backend.layouts.content.featuredProduct.newFeatured', compact('types'));
    }

    public function storeFeatured(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|in:active,not active',
                'title' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'sub_heading' => 'nullable|string',
                'button_link_1' => 'nullable|string',
                'button_link_2' => 'nullable|string',
            ]);

            $feature = new FeaturedProduct();
            $feature->fill($validatedData);
            $feature->save();

            return redirect()->route('admin.get-featured-product')->with('success', 'Featured Product Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Failed to Add Featured Product: " . $th->getMessage());
        }
    }


    public function editFeatured($id)
    {
        $feature = FeaturedProduct::findOrFail($id);
        $types = PageTypes::all();

        return view('backend.layouts.content.featuredProduct.editFeatured', compact('feature', 'types'));
    }

    public function updateFeatured(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|in:active,not active',
                'title' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'sub_heading' => 'nullable|string',
                'button_link_1' => 'nullable|string',
                'button_link_2' => 'nullable|string',
            ]);

            $feature = FeaturedProduct::findOrFail($id);
            $feature->fill($validateData);
            $feature->save();

            return redirect()->route('admin.get-featured-product')->with('success', 'Featured Product Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Update Featured Product " . $th->getMessage());
        }
    }

    public function deleteFeatured($id)
    {
        try {
            $feature = FeaturedProduct::findOrFail($id);
            $feature->delete();

            return redirect()->route('admin.get-featured-product')->with('success', 'Featured Product Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Delete Featured Product " . $th->getMessage());
        }
    }
}
