<?php

namespace App\Http\Controllers;
use App\Models\ShoppingItem;
use Illuminate\Http\Request;

class shoppingItemController extends Controller
{
    public function getAll() {
        $shoppingitems=ShoppingItem::with(['category'])->get();
        return $shoppingitems;
    }

    public function store(Request $request){
        $shoppingItem = new ShoppingItem;
        //$shoppingItem->user_id = $request->user_id;
        $shoppingItem->text = $request->text;
        $shoppingItem->high_prio = $request->high_prio;
        $shoppingItem->category_id = $request->category_id;
        $shoppingItem->save();
        return $shoppingItem;
    }

    public function delete($id) {
        $shoppingItem = ShoppingItem::findOrFail($id);
        $shoppingItem->delete();
        return "http kode ;)";
    }
}