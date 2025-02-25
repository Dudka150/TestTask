<?php

namespace App\Http\Controllers;

use App\Models\Mortgage;

use Illuminate\Http\Request;

class ShowMortgageController extends Controller
{
    public function index()
    {
        return response()->json(Mortgage::where('is_active', true)->get());
    }

    public function show(Mortgage $mortgage)
    {
        if (!$mortgage->is_active) {
            return response()->json(['error' => 'ошибка'], 404);
        }

        return response()->json([
            'title' => $mortgage->title,
            'percent' => $mortgage->percent,
            'price_range' => [
                'min' => $mortgage->min_price,
                'max' => $mortgage->max_price,
            ],
            'first_payment_range' => [
                'min' => $mortgage->min_first_payment,
                'max' => 98,
            ],
            'term_range' => [
                'min' => $mortgage->min_term,
                'max' => $mortgage->max_term,
            ],
        ]);
    }
}
