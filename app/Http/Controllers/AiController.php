<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AiController extends Controller
{
    public function generateDescription(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'category_name' => 'nullable|string',
        ]);

        $name = $request->input('name');
        $category = $request->input('category_name') ?? 'General';

        // Smart Templates Dictionary
        $templates = [
            'electronics' => [
                "Experience the future with the new $name. Designed for performance and style, this device features cutting-edge technology that keeps you ahead of the curve. Perfect for tech enthusiasts!",
                "Upgrade your tech game with $name. High speed, stunning resolution, and long-lasting battery life making it the ultimate companion for your daily needs.",
                "Introducing $name: Where innovation meets elegance. Enjoy seamless connectivity and powerful processing power in a sleek design."
            ],
            'fashion' => [
                "Step out in style with the $name. Crafted from premium materials, this piece offers both comfort and durability. A must-have addition to your wardrobe.",
                "Elevate your look with $name. Perfect for any occasion, blending classic design with modern trends. You'll love how it feels!",
                "Discover the elegance of $name. Designed to make you stand out, featuring exquisite details and a perfect fit."
            ],
            'home' => [
                "Transform your living space with $name. Blending functionality with modern aesthetics, it's the perfect upgrade for any home.",
                "Make your life easier with $name. Durable, efficient, and stylish—designed to handle your everyday tasks with ease.",
            ],
            'beauty' => [
                "Unleash your inner glow with $name. Formulated with premium ingredients to nourish and rejuvenate your look.",
                "Get the perfect finish with $name. Long-lasting and radiant, it's the secret weapon for your daily beauty routine."
            ],
            'default' => [
                "Get your hands on the all-new $name. High quality, reliable, and designed just for you. Don't miss out on this amazing deal!",
                "$name is here to redefine your experience. Premium quality at an unbeatable price. Order yours today!",
                "Looking for the best? $name delivers outstanding performance and style. A perfect choice for smart shoppers."
            ]
        ];

        // Determine category key (simple keyword matching)
        $catKey = 'default';
        $categoryLower = strtolower($category);
        if (str_contains($categoryLower, 'electr') || str_contains($categoryLower, 'phone') || str_contains($categoryLower, 'laptop')) $catKey = 'electronics';
        elseif (str_contains($categoryLower, 'cloth') || str_contains($categoryLower, 'fashion') || str_contains($categoryLower, 'wear')) $catKey = 'fashion';
        elseif (str_contains($categoryLower, 'home') || str_contains($categoryLower, 'kitchen') || str_contains($categoryLower, 'furnture')) $catKey = 'home';
        elseif (str_contains($categoryLower, 'beauty') || str_contains($categoryLower, 'skin') || str_contains($categoryLower, 'makeup')) $catKey = 'beauty';

        // Select random template
        $templateList = $templates[$catKey] ?? $templates['default'];
        $description = $templateList[array_rand($templateList)];

        return response()->json(['description' => $description]);
    }
}
