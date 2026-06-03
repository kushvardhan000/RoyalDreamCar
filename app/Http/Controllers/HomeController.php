<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Car;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Partner;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::query()
            ->where('status', 'published')
            ->orderBy('sort_order')
            ->get();

        $featuredCars = Car::query()
            ->with(['brand', 'model', 'primaryImage'])
            ->where('featured', true)
            ->where('status', 'published')
            ->where('sold', false)
            ->latest()
            ->take(6)
            ->get();

        $services = Service::query()
            ->where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        $testimonials = Testimonial::query()
            ->where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $partners = Partner::query()
            ->where('status', 'published')
            ->orderBy('sort_order')
            ->take(12)
            ->get();

        return view('pages.home', compact(
            'sliders',
            'featuredCars',
            'services',
            'testimonials',
            'partners'
        ));
    }
}