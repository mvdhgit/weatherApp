<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Your Weather App</title>
</head>

<body>
    <div>
        <h1>Welcome to Your Weather App!</h1>

        <form action="{{ route('weather.get') }}" method="GET">
            @csrf
            <label for="city">City:</label>
            <input type="text" id="city" name="city" value="{{ $city ?? '' }}" required>
            <button type="submit">Get Weather</button>
        </form>

        <!-- Display weather information -->
        @isset($weather)
            <h2>Weather in {{ $weather['name'] }}, {{ $weather['sys']['country'] }}</h2>
            <p>Temperature: {{ $weather['main']['temp'] - 273.15 }}°C</p>
            <p>Weather: {{ $weather['weather'][0]['description'] }}</p>
            <p>Min Temperature: {{ $weather['main']['temp_min'] - 273.15 }}°C</p>
            <p>Max Temperature: {{ $weather['main']['temp_max'] - 273.15 }}°C</p>
            <p>Pressure: {{ $weather['main']['pressure'] }} hPa</p>
            <p>Humidity: {{ $weather['main']['humidity'] }}%</p>
            <p>Wind Speed: {{ $weather['wind']['speed'] }} m/s</p>
            <p>Wind Direction: {{ $weather['wind']['deg'] }}°</p>
            <p>Cloudiness: {{ $weather['clouds']['all'] }}%</p>
            <p>Visibility: {{ $weather['visibility'] }} meters</p>
            <p>Sunrise: {{ date('H:i:s', $weather['sys']['sunrise']) }}</p>
            <p>Sunset: {{ date('H:i:s', $weather['sys']['sunset']) }}</p>
            <p>Latitude: {{ $weather['coord']['lat'] }}</p>
            <p>Longitude: {{ $weather['coord']['lon'] }}</p>
        @else 
            @isset($error)<!-- display error message -->
                <p>{{ $error }}</p>
            @endisset
        @endisset
    </div>
</body>

</html>
