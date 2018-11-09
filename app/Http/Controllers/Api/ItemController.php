<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewItemRequest;
use App\Managers\ItemManager;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /** @var ItemManager $itemManager */
    protected $itemManager;

    public function __construct(ItemManager $itemManager)
    {
        $this->itemManager = $itemManager;
    }

    /**
     * Add a new item
     * @param NewItemRequest $request
     * @return \Response
     * @throws \Exception
     */
    public function store(NewItemRequest $request)
    {
        $item = new Item;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->price_special = $request->price_special;
        $item->picture_url = $request->image;
        $item->category_id = $request->category;
        $item->order = 0;
        if (!$item->save()) {
            throw new \Exception ('Could not save new item');
        }
        return response($item);
    }

    /**
     * Delete item
     * @param Item $item
     * @return bool
     * @throws \Exception
     */
    public function destroy(Item $item)
    {
        if (!$item->delete()) {
            return response('Could not delete item', 400);
        }
    }
}
