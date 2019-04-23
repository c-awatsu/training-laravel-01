<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategory;
use App\Http\Requests\UpdateCategory;
use Exception;
use App\category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = category::paginate(10);

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategory $request
     * @return Response
     */
    public function store(StoreCategory $request)
    {
        category::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param category $category
     * @return Response
     */
    public function show(category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param category $category
     * @return Response
     */
    public function edit(category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategory $request
     * @param category $category
     * @return Response
     */
    public function update(UpdateCategory $request, category $category)
    {
        $category->update([
            'name'=>$request->input('name'),
        ]);

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param category $category
     * @return Response
     * @throws Exception
     */
    public function destroy(category $category)
    {
        $category->delete();

        return redirect()->route('categories.index');
    }

    public function search(Request $request){
        $searchWords = $request->input('searchWords');
        $categories = Category::searchCategories($searchWords)->paginate(10);
        return view('categories.index', compact('categories','searchWords'));
    }
}
