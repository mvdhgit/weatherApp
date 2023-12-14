<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function getWeather(Request $request)
    {
        $city = $request->input('city');
        $apiKey = config('services.openweathermap.key');
        $response = Http::get("http://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey");
        // check response. if city is not in db ->fail
        if ($response->failed()) {
            return view('welcome', ['error' => 'Failed to retrieve weather information.']);
        }
        $weather = $response->json();
        return view('welcome', compact('weather', 'city'));
    }
}
