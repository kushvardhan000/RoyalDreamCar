<?php

namespace App\Helpers;

class ImageHelper
{
    private static array $unsplashFallbacks = [
        'https://images.unsplash.com/photo-1552519592-2198d541a872?q=80&w=1600&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1568605117036-5fe5e7bab0b7?q=80&w=1600&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=1600&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1583121274602-3e2820c69888?q=80&w=1600&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?q=80&w=1600&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1603584173870-7f23fdae1b7a?q=80&w=1600&auto=format&fit=crop',
    ];

    private static array $logoFallbacks = [
        'https://images.unsplash.com/photo-1580273916550-e323be2ae537?q=80&w=400&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1611733366234-8cf6c455e528?q=80&w=400&auto=format&fit=crop',
    ];

    private static array $profileFallbacks = [
        'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=400&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=400&auto=format&fit=crop',
    ];

    public static function resolve(?string $path = null, string $type = 'car'): string
    {
        if (empty($path)) {
            return self::fallback($type);
        }

        if (preg_match('/^https?:\/\//', $path)) {
            return $path;
        }

        return asset('storage/' . ltrim($path, '/'));
    }

    public static function fallback(string $type = 'car'): string
    {
        return match ($type) {
            'logo' => self::$logoFallbacks[array_rand(self::$logoFallbacks)],
            'profile' => self::$profileFallbacks[array_rand(self::$profileFallbacks)],
            'car', 'hero', 'interior', 'exterior', 'engine' => self::$unsplashFallbacks[array_rand(self::$unsplashFallbacks)],
            default => self::$unsplashFallbacks[0],
        };
    }

    public static function hero(): string
    {
        return self::$unsplashFallbacks[array_rand(self::$unsplashFallbacks)];
    }

    public static function car(): string
    {
        return self::fallback('car');
    }

    public static function interior(): string
    {
        return self::fallback('interior');
    }

    public static function exterior(): string
    {
        return self::fallback('exterior');
    }

    public static function engine(): string
    {
        return self::fallback('engine');
    }

    public static function profile(): string
    {
        return self::fallback('profile');
    }

    public static function logo(): string
    {
        return self::fallback('logo');
    }

    public static function getCarFallbacks(): array
    {
        return self::$unsplashFallbacks;
    }

    public static function getSkeletonHtml(string $aspect = '16/9', string $classes = ''): string
    {
        return sprintf(
            '<div class="skeleton-loader aspect-[%s] %s"><style>.skeleton-loader{background:linear-gradient(90deg,#27272a 25%%,#1a1a1a 50%%,#27272a 75%%);background-size:200%% 100%%;animation:skeletonPulse 1.5s infinite;@keyframes skeletonPulse{0%{background-position:200%% 0}100%%{background-position:-200%% 0}}</style></div>',
            $aspect,
            $classes
        );
    }
}