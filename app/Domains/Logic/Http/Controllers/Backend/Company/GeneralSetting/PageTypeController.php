<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Company\GeneralSetting;

use App\Http\Controllers\Controller;
use App\Models\PageTypes;
use Illuminate\Http\Request;

class PageTypeController extends Controller
{
    public function getPageType(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');

        $query = PageTypes::query();
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        switch ($sort) {
            case 'ascending':
                $query->orderBy('name');
                break;
            case 'descending':
                $query->orderByDesc('name');
                break;
            case 'newest':
                $query->latest();
                break;
            case 'oldest':
                $query->oldest();
                break;
            default:
                $query->orderBy('name');
                break;
        }

        $types = $query->paginate(9);


        return view('backend.layouts.company.generalSetting.pageType', compact('sort', 'types'));
    }
    public function showPageType(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');

        $query = PageTypes::query();
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        switch ($sort) {
            case 'ascending':
                $query->orderBy('name');
                break;
            case 'descending':
                $query->orderByDesc('name');
                break;
            case 'newest':
                $query->latest();
                break;
            case 'oldest':
                $query->oldest();
                break;
            default:
                $query->orderBy('name');
                break;
        }

        $types = $query->paginate(9);
        return view('backend.layouts.company.generalSetting.pageType', compact('types', 'sort'));
    }

    public function updatePageType(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'name' => 'string'
            ]);

            $type = PageTypes::findOrFail($id);
            $type->fill($validateData);
            $type->save();

            return redirect()->route('admin.get-page-type')->with('success', 'Page Type Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.partnerList')->with('error', 'Failed to delete partner list: ' . $e->getMessage());
        }
    }

    public function storePageType(Request $request)
    {
        try {
            $validateData = $request->validate([
                'name' => 'required|string',
            ]);

            $type = new PageTypes();
            $type->fill($validateData);
            $type->save();

            return redirect()->route('admin.get-page-type')->with('success', 'Page Type Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to Add Page Type: ' . $th->getMessage());
        }
    }


    public function deletePageType($id)
    {
        try {
            $type = PageTypes::findOrFail($id);
            $type->delete();

            return redirect()->route('admin.get-page-type')->with('success', 'Page Type Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Hero: ' . $e->getMessage());
        }
    }
}
