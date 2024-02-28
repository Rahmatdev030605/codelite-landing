<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Company\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company\Partner\Partners;
use App\Models\Company\Partner\PartnerList;
use Illuminate\Support\Facades\Storage;

class PartnersController extends Controller
{
    //*************PARTNER VIEW*************** */

    public function getPartnersView(Request $request)
    {
        $partnerView = Partners::all();
        return view('backend.layouts.company.partner.partnersView',compact('partnerView'));

    }

    //*************PARTNER DATA*************** */
    public function getPartners(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');
        $publicImg = 'img/partners/';

        $query = Partners::query();

        if ($search) {
            $query->where('partners_name', 'like', '%' . $search . '%');
        }

        switch ($sort) {
            case 'ascending':
                $query->orderBy('partners_name');
                break;
            case 'descending':
                $query->orderByDesc('partners_name');
                break;
            case 'newest':
                $query->latest();
                break;
            case 'oldest':
                $query->oldest();
                break;
            default:
                $query->orderBy('partners_name');
                break;
        }

        $partners = $query->paginate(9);

        foreach ($partners as $partner) {
            $imagePathPublic = public_path("img/partners/" . basename($partner['partners_image']));
            $imagePathStorage = storage_path("app/public/partners_image/" . basename($partner['partners_image']));

            if (file_exists($imagePathPublic)) {
                $partner['partners_image'] = asset("img/partners/" . basename($partner['partners_image']));
            } elseif (file_exists($imagePathStorage)) {
                $partner['partners_image'] = asset("storage/partners_image/" . basename($partner['partners_image']));
            } else {
                $partner['partners_image'] = asset("img/partners/calendar.png");
            }
        }

        return view('backend.layouts.company.partner.partners', compact('partners', 'sort'));
    }


    public function storePartners(Request $request)
    {
        $request->validate([
            'partners_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'partners_name' => 'required|max:255',
        ]);

        $partner = new Partners;

        if ($request->hasFile('partners_image')) {
            $imagePath = $request->file('partners_image')->store('public/partners_image');
            $partner->partners_image = str_replace('public/', '', $imagePath);
        }

        $partner->partners_name = $request->input('partners_name');
        $partner->save();

        return redirect()->route('admin.partners')->with('success', 'Partner created successfully');
    }



    public function showPartners(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');
        $publicImg = 'img/partners/';

        $partners = Partners::query();

        if ($search) {
            $partners->where('partners_name', 'like', '%' . $search . '%');
        }

        if ($sort) {
            switch ($sort) {
                case 'ascending':
                    $partners->orderBy('partners_name');
                    break;
                case 'descending':
                    $partners->orderByDesc('partners_name');
                    break;
                case 'newest':
                    $partners->latest();
                    break;
                case 'oldest':
                    $partners->oldest();
                    break;
                default:
                    $partners->orderBy('partners_name');
                    break;
            }
        }

        $partners = $partners->paginate(10);
        foreach ($partners as $partner) {
            $imagePathPublic = public_path("img/partners/" . basename($partner['partners_image']));
            $imagePathStorage = storage_path("app/public/partners_image/" . basename($partner['partners_image']));

            if (file_exists($imagePathPublic)) {
                $partner['partners_image'] = asset("img/partners/" . basename($partner['partners_image']));
            } elseif (file_exists($imagePathStorage)) {
                $partner['partners_image'] = asset("storage/partners_image/" . basename($partner['partners_image']));
            } else {
                $partner['partners_image'] = asset("img/partners/calendar.png");
            }
        }

        return view('backend.layouts.company.partner.partners', compact('partners', 'sort'));
    }

    public function updatePartners(Request $request, $id)
    {
        $request->validate([
            'partners_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'partners_name' => 'max:255',
        ]);

        $partners = Partners::find($id);

        if (!$partners) {
            return redirect()->route('admin.partners')->with('error', 'Partner not found');
        }

        if ($request->hasFile('partners_image')) {
            $imagePath = $request->file('partners_image')->store('partners_image', 'public');

            if ($partners->partners_image) {
                Storage::disk('public')->delete($partners->partners_image);
            }

            $partners->partners_image = $imagePath;
        }

        $partners->partners_name = $request->input('partners_name');
        $partners->save();

        return redirect()->route('admin.partners')->with('success', 'Partner updated successfully');
    }

    public function destroyPartners($id)
{
    try {
        $partners = Partners::findOrFail($id);
        if ($partners->partners_image) {
            Storage::disk('public')->delete($partners->partners_image);
        }
        $partners->delete();

        return redirect()->route('admin.partners')->with('success', 'Partner deleted successfully');
    } catch (\Exception $e) {
        return redirect()->route('admin.partners')->with('error', 'Failed to delete partner: ' . $e->getMessage());
    }
}

//*************PARTNER LIST*************** */
public function getPartnersList(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');

        $query = PartnerList::query();

        if ($search) {
            $query->where('partner_title', 'like', '%' . $search . '%');
        }

        switch ($sort) {
            case 'ascending':
                $query->orderBy('partner_title');
                break;
            case 'descending':
                $query->orderByDesc('partner_title');
                break;
            case 'newest':
                $query->latest();
                break;
            case 'oldest':
                $query->oldest();
                break;
            default:
                $query->orderBy('partner_title');
                break;
        }

        $partnerList = $query->paginate(9);

        return view('backend.layouts.company.partner.partnerList', compact('partnerList', 'sort'));
}

    public function storePartnersList(Request $request)
    {
        $request->validate([
            'partner_title' => 'required|max:255',
        ]);

        $partnerList = new PartnerList;
        $partnerList->partner_title = $request->input('partner_title');
        $partnerList->save();

        return redirect()->route('admin.partnerList')->with('success', 'Partner List created successfully');
    }


    public function showPartnersList(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');

        $partnerList = PartnerList::query();
        if ($search) {
            $partnerList->where('partner_title', 'like', '%' . $search . '%');
        }

        if ($sort) {
            switch ($sort) {
                case 'ascending':
                    $partnerList->orderBy('partner_title');
                    break;
                case 'descending':
                    $partnerList->orderByDesc('partner_title');
                    break;
                case 'newest':
                    $partnerList->latest();
                    break;
                case 'oldest':
                    $partnerList->oldest();
                    break;
                default:
                    $partnerList->orderBy('partner_title');
                    break;
            }
        }

        $partnerList = $partnerList->paginate(10);

        return view('backend.layouts.company.partner.partnerList', compact('partnerList', 'sort'));
    }

    public function updatePartnersList(Request $request, $id)
    {
        $request->validate([
            'partner_title' => 'max:255',
        ]);

        $partnerList = PartnerList::find($id);

        $partnerList->partner_title = $request->input('partner_title');
        $partnerList->save();

        return redirect()->route('admin.partnerList')->with('success', 'Partner List updated successfully');
    }

    public function destroyPartnersList($id)
{
    try {
        $partnerList = PartnerList::find($id);
        $partnerList->delete();

        return redirect()->route('admin.partnerList')->with('success', 'Partner List deleted successfully');
    } catch (\Exception $e) {
        return redirect()->route('admin.partnerList')->with('error', 'Failed to delete partner list: ' . $e->getMessage());
    }
}
}

