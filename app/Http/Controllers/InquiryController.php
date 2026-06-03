<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Car;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function store(Request $request, Car $car)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'message' => 'nullable|string|max:5000',
        ]);

        Inquiry::create(array_merge(
            $validated,
            [
                'car_id' => $car->id,
                'status' => 'new',
                'source' => 'website',
            ]
        ));

        return redirect()->back()->with('success', 'Inquiry submitted successfully. We will contact you soon.');
    }
}
