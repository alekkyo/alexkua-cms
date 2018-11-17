<?php

namespace App\Managers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemManager
{
    /**
     * Get all items for the search query
     * @param array $params
     * @return array
     */
    public function getItems(array $params = [])
    {
        $items = Item::query()->with('category');
        return $items->get();
    }
}