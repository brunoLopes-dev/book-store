<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Book;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::with('address')->get();
        return response()->json($stores);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'active' => 'required|boolean',
            'street' => 'required|string',
            'number' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'postal_code' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $address = Address::create($validator->validated([
            'street', 'number', 'city', 'state', 'country', 'postal_code'
        ]));

        $store = Store::create([
            'name' => $request->name,
            'active' => $request->active,
            'address_id' => $address->id
        ]);

        return response()->json($store->load('address'), 201);
    }

    public function show($id)
    {
        $store = Store::with('address')->find($id);
        if (!$store) {
            return response()->json(['message' => 'Store not found'], 404);
        }
        return response()->json($store);
    }

    public function update(Request $request, $id)
    {
        $store = Store::with('address')->find($id);
        if (!$store) {
            return response()->json(['message' => 'Store not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'active' => 'required|boolean',
            'street' => 'required|string',
            'number' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'postal_code' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $store->update($validator->validated(['name', 'active']));
        $store->address->update($validator->validated([
            'street', 'number', 'city', 'state', 'country', 'postal_code'
        ]));

        return response()->json($store->load('address'));
    }

    public function destroy($id)
    {
        $store = Store::find($id);
        if (!$store) {
            return response()->json(['message' => 'Store not found'], 404);
        }

        $store->address->delete(); // Delete the address associated with the store
        $store->delete();

        return response()->json(['message' => 'Store and associated address deleted successfully']);
    }

    public function attachBook(Request $request, Store $store, Book $book)
    {
        // Add the book to the store
        $store->books()->attach($book);

        return response()->json([
            'message' => 'Book added to store successfully',
            'store' => $store->load('books')
        ]);
    }
}
