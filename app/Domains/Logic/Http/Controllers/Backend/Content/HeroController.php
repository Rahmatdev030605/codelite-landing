<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Content;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\PageTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    //hero

    public function getHero()
    {

        return view('backend.layouts.content.hero.hero');
    }

    public function newHero()
    {
        $types = PageTypes::all();
        return view('backend.layouts.content.hero.newHero', compact('types'));
    }


    public function storeHero(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|boolean',
                'title' => 'required|string|max:255',
                'heading' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif,svg|max:2048',
                'sub_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif,svg|max:2048',
                'highlight_1' => 'nullable|string',
                'highlight_2' => 'nullable|string',
                'highlight_3' => 'nullable|string',
                'button_link_1' => 'nullable|string',
                'button_link_2' => 'nullable|string',
            ]);

            $hero = new Hero();
            $hero->fill($validatedData);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/img/hero');
                $hero->image = str_replace('public/', '', $imagePath);
            }

            if ($request->hasFile('sub_image')) {
                $subImagePath = $request->file('sub_image')->store('public/img/hero');
                $hero->sub_image = str_replace('public/', '', $subImagePath);
            }

            // if ($request->hasFile('image')) {
            //     $imagePath = $request->file('image')->store('public/image/hero');
            //     $hero->image = str_replace('public/', '', $imagePath);
            // }

            // if ($request->hasFile('sub_image')) {
            //     $subImagePath = $request->file('sub_image')->store('public/image/hero');
            //     $hero->sub_image = str_replace('public/', '', $subImagePath);
            // }

            $hero->save();

            return redirect()->route('admin.get-hero')->with('success', 'Hero Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to Add Hero: ' . $th->getMessage());
        }
    }


    public function editHero($id)
    {
        $hero = Hero::findOrFail($id);
        $types = PageTypes::all();

        if ($hero) {
            if (Storage::exists('public/image/hero/' . basename($hero->image))) {
                $hero->image = asset("storage/image/hero/" . basename($hero->image));
            } elseif (Storage::exists('app/public/image/hero/' . basename($hero->image))) {
                $hero->image = asset("storage/image/hero/" . basename($hero->image));
            } elseif (file_exists(public_path("img/hero/" . basename($hero->image)))) {
                $hero->image = asset("img/hero/" . basename($hero->image));
            }

            if (Storage::exists('public/image/hero/' . basename($hero->sub_image))) {
                $hero->sub_image = asset("storage/image/hero/" . basename($hero->sub_image));
            } elseif (Storage::exists('app/public/image/hero/' . basename($hero->sub_image))) {
                $hero->sub_image = asset("storage/image/hero/" . basename($hero->sub_image));
            } elseif (file_exists(public_path("img/hero/" . basename($hero->sub_image)))) {
                $hero->sub_image = asset("img/hero/" . basename($hero->sub_image));
            }
        }

        return view('backend.layouts.content.hero.editHero', compact('hero', 'types'));
    }

    public function updateHero(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|boolean',
                'title' => 'required|string|max:255',
                'heading' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif,svg|max:2048',
                'sub_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif,svg|max:2048',
                'highlight_1' => 'nullable|string',
                'highlight_2' => 'nullable|string',
                'highlight_3' => 'nullable|string',
                'button_link_1' => 'nullable|string',
                'button_link_2' => 'nullable|string',

            ]);

            $hero = Hero::findOrFail($id);

            $hero->fill($validateData);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/image/hero');
                if ($hero->image) {
                    Storage::disk('public')->delete($hero->image);
                }
                $hero->image = str_replace('public/', '', $imagePath);
            }

            if ($request->hasFile('sub_image')) {
                $subImagePath = $request->file('sub_image')->store('public/image/hero');
                if ($hero->sub_image) {
                    Storage::disk('public')->delete($hero->sub_image);
                }
                $hero->sub_image = str_replace('public/', '', $subImagePath);
            }

            $hero->save();

            return redirect()->route('admin.get-hero')->with('success', 'Hero Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to Update Hero: ' . $th->getMessage());
        }
    }

    public function deleteHero($id)
    {
        try {
            $hero = Hero::findOrFail($id);

            if ($hero->image) {
                Storage::disk('public')->delete($hero->image);
            } elseif ($hero->sub_image) {
                Storage::disk('public')->delete($hero->sub_image);
            }

            $hero->delete();

            return redirect()->route('admin.get-hero')->with('success', 'Hero deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Hero: ' . $e->getMessage());
        }
    }
}
