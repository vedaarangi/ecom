<?php

namespace App\Http\Controllers;

use App\Models\B2bQuoteRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class B2bQuoteController extends Controller
{
    /**
     * Store a newly created B2B Quote Request.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'gstin' => 'nullable|string|max:50',
            'rice_variety' => 'required|string|max:255',
            'quantity' => 'required|string|max:255',
            'packaging_type' => 'required|string|max:255',
            'delivery_pincode' => 'required|string|max:20',
            'delivery_city' => 'required|string|max:255',
            'notes' => 'nullable|string|max:2000',
        ]);

        $quoteRequest = B2bQuoteRequest::create($validated);

        $message = __('Thank you! Your wholesale quote request has been submitted successfully. Our mill-direct trade desk will contact you within 24 hours with factory-direct pricing.');

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'error' => false,
                'message' => $message,
                'data' => $quoteRequest,
            ]);
        }

        return back()->with('success_msg', $message)->with('status', $message);
    }
}
