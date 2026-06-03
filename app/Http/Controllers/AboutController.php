<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\SeoMeta;
use App\Models\Team;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;

class AboutController extends Controller
{
    /**
     * Display the About page.
     */
    public function index(): View
    {
        try {
            $about = AboutUs::where('status', 'published')->first();

            $teams = Team::where('status', 'published')
                ->orderBy('sort_order')
                ->get();

            $seo = SeoMeta::where('page_key', 'about')->first();
        } catch (\Throwable $e) {
            Log::error('Failed to load About page.', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);

            // Graceful fallbacks
            $about = null;
            $teams = collect();
            $seo = null;
        }

        return view(
            'pages.about',
            compact(
                'about',
                'teams',
                'seo'
            )
        );
    }
}
