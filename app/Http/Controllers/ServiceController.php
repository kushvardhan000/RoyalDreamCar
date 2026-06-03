<?php

namespace App\Http\Controllers;

use App\Models\SeoMeta;
use App\Models\Service;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     */
    public function index(Request $request): View
    {
        try {
            $services = Service::where('status', 'published')
                ->latest()
                ->paginate(12);

            $seo = SeoMeta::where('page_key', 'services')->first();
        } catch (\Throwable $e) {
            Log::error('Failed to load services index.', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);

            // Graceful fallbacks
            $services = collect();
            $seo = null;
        }

        return view('pages.services', compact('services', 'seo'));
    }

    /**
     * Display the specified service.
     */
    public function show(string $slug): View
    {
        try {
            $service = Service::where('slug', $slug)
                ->where('status', 'published')
                ->firstOrFail();

            // Get related services (published, excluding current, latest 3)
            $relatedServices = Service::where('status', 'published')
                ->where('id', '!=', $service->id)
                ->latest()
                ->take(3)
                ->get();

            $seo = SeoMeta::where('page_key', 'service-details')->first();
        } catch (\Throwable $e) {
            // Log the exception
            Log::error('Failed to load service details for slug: '.$slug, [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);

            // If it's a model not found exception, we want to let Laravel handle the 404
            // But for other exceptions, we fall back to an empty service and redirect or show error?
            // Since we are using firstOrFail, it will throw ModelNotFoundException which results in 404.
            // We'll rethrow if it's a ModelNotFoundException to let Laravel handle it.
            if ($e instanceof ModelNotFoundException) {
                throw $e;
            }

            // For other exceptions, we set fallback values and let the view handle it (showing errors)
            $service = null;
            $relatedServices = collect();
            $seo = null;
        }

        return view('pages.service-details', compact('service', 'relatedServices', 'seo'));
    }
}