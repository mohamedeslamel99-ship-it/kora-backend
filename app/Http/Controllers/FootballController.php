<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FootballController extends Controller
{
    public function proxy(Request $request, $path)
    {
        // جلب المفتاح السري من ملف الـ .env
        $apiKey = env('FOOTBALL_DATA_API_KEY');
        
        // رابط الـ API الأصلي بتاع الكورة
        $baseUrl = 'https://api.football-data.org/v4/';
        
        // بناء الرابط النهائي
        $url = $baseUrl . $path;

        // إرسال الطلب للـ API الأصلي مع إرفاق المفتاح في الهيدر
        $response = Http::withHeaders([
            'X-Auth-Token' => $apiKey,
        ])->get($url, $request->query());

        // إرجاع النتيجة للفرونت إند بتاعك بنفس الاستجابة
        return response($response->body(), $response->status())
                ->header('Content-Type', 'application/json');
    }
}