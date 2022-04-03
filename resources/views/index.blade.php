<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Weather App</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    </head>
    <body>
        <br>
        <br>
        @extends('layouts.app')
  <div class="container">
    <form id="inputform">
    <h3><label for="city">Weather App</label></h3>
        <h5><label for="city">Type City Names Separated By Commas</label></h5>

        <div class="input-group">
        <div class="form-outline">
        <input type="text" id="city" name="city" class="form-control rounded" 
        placeholder="Search"  aria-label="Search" aria-describedby="search-addon" />
        </div>
        <button type="button" value="Load" id="load" class="btn btn-outline-primary">search</button>
    </div>
   

    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" value="metric" name="unit" checked="true" id="defaultGroupExample1">
        <label class="custom-control-label" for="defaultGroupExample1">Celcius</label>
    </div>

    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" value="kelvin" name="unit" id="defaultGroupExample2" checked>
        <label class="custom-control-label" for="defaultGroupExample2">Kelvin</label>
    </div>
    <br>
    <h3> Your Location Now</h3>
	<div>
    <div class="table-responsive-sm">

        <table class="table">
        <thead>
            <tr>
            <th scope="row">IP</th>
            <th scope="row">Country Name</th>
            <th scope="row">Country Code</th>
            <th scope="row">Region Code</th>
            <th scope="row">Region Name</th>
            <th scope="row">City Name</th>
            <th scope="row">Latitude</th>
            <th scope="row">Longitude</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>{{ $data->ip }}</td>
            <td>{{ $data->countryName }}</td>
            <td>{{ $data->countryCode }}</td>
            <td>{{ $data->regionCode }}</td>
            <td>{{ $data->regionName }}</td>
            <td>{{ $data->cityName }}</td>
            <td>{{ $data->latitude }}</td>
            <td>{{ $data->longitude }}</td>
            </tr>
        </tbody>
        </table>
    </div>    
        
    </form>
    <div class="table-responsive-sm">
    <h3> <br> Data in Table</h3>
    
        <table id="data-table">
            <thead>
                <tr>
                    <th>Country</th>
                    <th>Name</th>
                    <th>Temperature</th>
                    <th>Temp Min</th>
                    <th>Temp Max</th>
                    <th>Description</th>
                </tr>
            </thead>
        </table>
    </div>
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function (reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>
    </body>
</html>
