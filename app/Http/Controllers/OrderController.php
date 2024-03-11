<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->check()) {
            $user_id = auth()->user()->id;
            $dataOrder = Order::where('user_id', $user_id)->get();

            return view('cart', compact('dataOrder'));
        }

        return redirect('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->check()) {

            $userId = auth()->user()->id;
            $requestValues = Order::where('catalog_id', $request->catalog_id)->where('user_id', $userId)->first();

            if ($requestValues) {
                $requestValues->count += 1;
                $requestValues->save();
            } else {
                $newRequest = new Order([
                    'catalog_id' => $request->catalog_id,
                    'user_id' => auth()->user()->id,
                    'count' => 1
                ]);
                $newRequest->save();
            }

            return redirect('cart');
        }

        return redirect('login');
    }

    public function decrementItem(Request $request)
    {
        $userId = auth()->user()->id;
        $requestValues = Order::where('catalog_id', $request->catalog_id)->where('user_id', $userId)->first();

        if ($requestValues) {
            $requestValues->count -= 1;
            $requestValues->save();

            if ($requestValues->count === 0) {
                Order::destroy($requestValues->id);
            }
        }

        return redirect('cart');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
        Order::destroy($id);

        return redirect('cart');
    }
}
