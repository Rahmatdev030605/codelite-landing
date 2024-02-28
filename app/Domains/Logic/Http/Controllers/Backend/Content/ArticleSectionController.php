<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Content;

use App\Http\Controllers\Controller;
use App\Models\ArticleSection;
use App\Models\PageTypes;
use Illuminate\Http\Request;

class ArticleSectionController extends Controller
{
    public function getArticles(Request $request)
    {
        $sort = $request->input('sort');
        $search = $request->input('search');
        $query = ArticleSection::query();
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
                $query->orderBy('heading')->orderBy('sub_heading');
                break;
            case 'descending':
                $query->orderByDesc('heading')->orderByDesc('sub_heading');
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

        $articles = $query->paginate($perPage);
        $pageTypes = PageTypes::all();
        $totalArticle = $articles->total();
        $articles->appends($request->query());

        return view('backend.layouts.content.article.article', compact('articles', 'sort', 'search', 'pageTypes', 'totalArticle'));
    }

    public function showArticles(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');
        $query = ArticleSection::query();
        $perPage = $request->query('perPage', 10);
        $pageTypes = PageTypes::all();


        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('heading', 'like', '%' . $search . '%')
                    ->orWhere('sub_heading', 'like', '%' . $search . '%');
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
                $query->orderBy('heading')->orderBy('sub_heading');
                break;
            case 'descending':
                $query->orderByDesc('heading')->orderBy('sub_heading');
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

        $articles = $query->paginate($perPage);
        $totalArticle = $articles->total();
        $articles->appends($request->query());

        return view('backend.layouts.content.article.article', compact('articles', 'totalArticle', 'sort', 'search', 'pageTypes'));
    }

    public function newArticles()
    {
        $types = PageTypes::all();
        return view('backend.layouts.content.article.newArticle', compact('types'));
    }

    public function storeArticles(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|in:active,not active',
                'title' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'sub_heading' => 'nullable|string',
                'button_link' => 'nullable|string',
            ]);

            $article = new ArticleSection();
            $article->fill($validatedData);
            $article->save();

            return redirect()->route('admin.get-article-section')->with('success', 'Assistance Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to Add Article: ' . $th->getMessage());
        }
    }

    public function editArticles($id)
    {
        $article = ArticleSection::findOrFail($id);
        $types = PageTypes::all();

        return view('backend.layouts.content.article.editArticle', compact('article', 'types'));
    }

    public function updateArticles(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|in:active,not active',
                'title' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'sub_heading' => 'nullable|string',
                'button_link' => 'nullable|string',
            ]);

            $article = ArticleSection::findOrFail($id);
            $article->fill($validatedData);
            $article->save();

            return redirect()->route('admin.get-article-section')->with('success', 'Assistance updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to Article Updated: ' . $th->getMessage());
        }
    }

    public function deleteArticles($id)
    {
        try {
            $article = ArticleSection::findOrFail($id);
            $article->delete();

            return redirect()->route('admin.get-article-section')->with('success', 'Article Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Delete Article " . $th->getMessage());
        }
    }
}
