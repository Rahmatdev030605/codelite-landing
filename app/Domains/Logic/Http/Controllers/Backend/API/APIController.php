<?php
// APIController.php

namespace App\Domains\Logic\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\Home;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getHomeData(Request $request)
    {
        try {
            $homeData = Home::first();

            if ($homeData) {
                $publicImg = 'img/home/';
                $homeData->hero_image = asset($publicImg . basename($homeData->hero_image)); // Menggunakan asset untuk membuat URL gambar lengkap

                return response()->json([
                    'status' => 'success',
                    'data' => $homeData,
                ], 200);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data not found.',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to fetch data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function getHeroDataById(Request $request, $id)
    {
        try {
            $hero = Hero::findOrFail($id);

            if ($hero) {
                $publicImg = 'img/hero/';

                $publicImagePath = public_path($publicImg . basename($hero->image));

                $storageImagePath = storage_path("app/public/image/hero/" . basename($hero->image));

                if (file_exists($publicImagePath)) {
                    $imagePath = asset($publicImg . basename($hero->image));
                } elseif (file_exists($storageImagePath)) {
                    $imagePath = asset("storage/image/hero/" . basename($hero->image));
                } else {
                    $imagePath = asset("img/default/default-no-image.jpg");
                }

                $publicSubImagePath = public_path($publicImg . basename($hero->sub_image));

                $storageSubImagePath = storage_path("app/public/image/hero/" . basename($hero->sub_image));

                if (file_exists($publicSubImagePath)) {
                    $subImagePath = asset($publicImg . basename($hero->sub_image));
                } elseif (file_exists($storageSubImagePath)) {
                    $subImagePath = asset("storage/image/hero/" . basename($hero->sub_image));
                } else {
                    $subImagePath = asset("img/default/default-no-image.jpg");
                }

                $heroData[] = [
                    'id' => $hero->id,
                    'status' => $hero->status,
                    'title' => $hero->title,
                    'heading' => $hero->heading,
                    'sub_heading' => $hero->sub_heading,
                    'description' => $hero->description,
                    'button_link' => $hero->button_link,
                    'page_type_id' => $hero->page_type_id,
                    'image' => $imagePath,
                    'sub_image' => $subImagePath,
                ];

                return response()->json($heroData, 200);
            } else {
                return response()->json([
                    'message' => 'Data not found.',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to fetch data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getAllHeroData(Request $request)
    {
        try {
            $heroes = Hero::all();
            $heroData = [];

            foreach ($heroes as $hero) {


                $storageImagePath = storage_path("app/public/hero/" . basename($hero->image));

                if (file_exists($storageImagePath)) {
                    $imagePath = asset("storage/hero/" . basename($hero->image));
                } else {
                    $imagePath = asset("img/default/default-no-image.jpg");
                }

                $storageSubImagePath = storage_path("app/public/hero/" . basename($hero->sub_image));

                if (file_exists($storageSubImagePath)) {
                    $subImagePath = asset("storage/hero/" . basename($hero->sub_image));
                } else {
                    $subImagePath = asset("img/default/default-no-image.jpg");
                }

                if ($hero->page_type_id === 1) {
                    $heroData['home'] = [
                        'id' => $hero->id,
                        'status' => $hero->status,
                        'title' => $hero->title,
                        'heading' => $hero->heading,
                        'description' => $hero->description,
                        'button_link' => $hero->button_link,
                        'highlight_1' => $hero->highlight_1,
                        'highlight_2' => $hero->highlight_2,
                        'highlight_3' => $hero->highlight_3,
                        'page_type_id' => $hero->page_type_id,
                        'image' => $imagePath,
                        'sub_image' => $subImagePath,
                    ];
                } elseif ($hero->page_type_id === 2) {
                    $heroData['company'] = [
                        'id' => $hero->id,
                        'status' => $hero->status,
                        'title' => $hero->title,
                        'heading' => $hero->heading,
                        'sub_heading' => $hero->sub_heading,
                        'description' => $hero->description,
                        'button_link' => $hero->button_link,
                        'highlight_1' => $hero->highlight_1,
                        'highlight_2' => $hero->highlight_2,
                        'highlight_3' => $hero->highlight_3,
                        'page_type_id' => $hero->page_type_id,
                        'image' => $imagePath,
                        'sub_image' => $subImagePath,
                    ];
                } elseif ($hero->page_type_id === 3) {
                    $heroData['portfolio'] = [
                        'id' => $hero->id,
                        'status' => $hero->status,
                        'title' => $hero->title,
                        'heading' => $hero->heading,
                        'sub_heading' => $hero->sub_heading,
                        'description' => $hero->description,
                        'button_link' => $hero->button_link,
                        'highlight_1' => $hero->highlight_1,
                        'highlight_2' => $hero->highlight_2,
                        'highlight_3' => $hero->highlight_3,
                        'page_type_id' => $hero->page_type_id,
                        'image' => $imagePath,
                        'sub_image' => $subImagePath,
                    ];
                } elseif ($hero->page_type_id === 4) {
                    $heroData['services'] = [
                        'id' => $hero->id,
                        'status' => $hero->status,
                        'title' => $hero->title,
                        'heading' => $hero->heading,
                        'sub_heading' => $hero->sub_heading,
                        'description' => $hero->description,
                        'button_link' => $hero->button_link,
                        'highlight_1' => $hero->highlight_1,
                        'highlight_2' => $hero->highlight_2,
                        'highlight_3' => $hero->highlight_3,
                        'page_type_id' => $hero->page_type_id,
                        'image' => $imagePath,
                        'sub_image' => $subImagePath,
                    ];
                }
            }

            return response()->json($heroData, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to fetch data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

}
