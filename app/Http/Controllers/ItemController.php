<?php

namespace App\Http\Controllers;

use App\category;
use App\Http\Requests\StoreItem;
use App\Http\Requests\UpdateItem;
use Exception;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = Item::paginate(10);

        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::listOfOptions();

        return view('items.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreItem $request
     * @return Response
     */
    public function store(StoreItem $request)
    {
        Item::create([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Item $item
     * @return Response
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Item $item
     * @return Response
     */
    public function edit(Item $item)
    {
        $categories = Category::listOfOptions();
        return view('items.edit', compact('item','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateItem $request
     * @param Item $item
     * @return Response
     */
    public function update(UpdateItem $request, Item $item)
    {
        $item->update([
            'name'=>$request->input('name'),
            'category_id'=>$request->input('category_id')
        ]);

        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Item $item
     * @return Response
     * @throws Exception
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index');
    }

    /**
     * @param Request $request
     *
     * @return Item
     */
    public function search(Request $request){
        $searchWords = $request->input('searchWords');
        $items = Item::searchItems($searchWords)->paginate(10);
        return view('items.index', compact('items','searchWords'));
    }
}
