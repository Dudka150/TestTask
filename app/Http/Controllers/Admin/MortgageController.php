<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mortgage;
use Illuminate\Http\Request;

class MortgageController extends Controller
{
    public function index()
    {
        return response()->json(Mortgage::all());
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'is_active' => 'boolean',
            'description' => 'nullable|string',
            'percent' => 'required|integer|min:0|max:40',
            'min_first_payment' => 'required|integer|min:0|max:98',
            'max_price' => 'required|numeric|min:0',
            'min_price' => 'required|numeric|min:0',
            'min_term' => 'required|integer|min:1',
            'max_term' => 'required|integer|min:1',
        ]);

        $mortgage = Mortgage::create($data);
        return response()->json($mortgage, 201);
    }

    public function show(Mortgage $mortgage)
    {
        return response()->json($mortgage);
    }

    public function edit(string $id)
    {
        
    }

    public function update(Request $request, Mortgage $mortgage)
    {
        $data = $request->validate([
            'title' => 'sometimes|string|max:255',
            'is_active' => 'sometimes|boolean',
            'description' => 'nullable|string',
            'percent' => 'sometimes|integer|min:0|max:40',
            'min_first_payment' => 'sometimes|integer|min:0|max:98',
            'max_price' => 'sometimes|numeric|min:0',
            'min_price' => 'sometimes|numeric|min:0',
            'min_term' => 'sometimes|integer|min:1',
            'max_term' => 'sometimes|integer|min:1',
        ]);

        $mortgage->update($data);
        return response()->json($mortgage);
    }

    public function destroy(Mortgage $mortgage)
    {
        $mortgage->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
