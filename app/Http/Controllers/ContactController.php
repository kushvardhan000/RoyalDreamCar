<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\SeoMeta;
use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\TransactionManager;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     */
    public function index(): View
    {
        try {
            $seo = SeoMeta::where('page_key', 'contact')->first();
            $settings = Setting::pluck('value', 'key')->toArray();
        } catch (\Throwable $e) {
            Log::error('Failed to load contact page.', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);

            // Graceful fallbacks
            $seo = null;
            $settings = [];
        }

        return view('pages.contact', compact('seo', 'settings'));
    }

    /**
     * Store a new contact message.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'nullable|email',
            'message' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        // Use a transaction to ensure data integrity
        try {
            // We'll use the DB transaction directly or via the model's save within a transaction.
            // Since we are only saving one record, we can use the model's save within a transaction.
            // However, we'll use the transaction manager for explicit control.
            app(TransactionManager)->transaction(function () use ($request) {
                ContactMessage::create([
                    'name' => $request->input('name'),
                    'phone' => $request->input('phone'),
                    'email' => $request->input('email'),
                    'message' => $request->input('message'),
                    'status' => 'new',
                ]);
            });

            return Redirect::back()
                ->with('success', 'Your message has been sent successfully. We will get back to you shortly.');
        } catch (\Throwable $e) {
            Log::error('Failed to store contact message.', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
                'input' => $request->all(),
            ]);

            return Redirect::back()
                ->withInput()
                ->with('error', 'Failed to send your message. Please try again later.');
        }
    }
}