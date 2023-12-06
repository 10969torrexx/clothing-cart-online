<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bought;
use Illuminate\Support\Facades\Auth;

class BoughtsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boughts = Bought::join('products', 'boughts.product_id', 'products.id')
        ->select(
            'products.product_name', 
            'products.price', 
            'products.category', 
            'boughts.id',
            'boughts.*'
        )
        ->where('boughts.user_id',  Auth::user()->id)
        ->orderBy('boughts.id', 'desc')
        ->get();

        return view('pages.purchase-list', compact('boughts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'product_id' => $request->productId,
            'quantity' => $request->quantity,
            'total_price' => $request->totalPrice,
            'payment' => $request->payment,
            'change' => $request->change,
        ];
        
        Bought::create($data);

        return redirect(route('purchase-list'))->with('success', 'Product Succesfully Bought!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
