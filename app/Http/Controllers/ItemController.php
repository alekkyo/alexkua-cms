<?php

namespace App\Http\Controllers;

use App\Http\Managers\ItemManager;
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->itemManager->getItems();
        return view('items');
    }
}
