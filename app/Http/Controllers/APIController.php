<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Dnsimmons\OpenWeather\OpenWeather;
use Kolirt\Openstreetmap\Facade\Openstreetmap;
use App\Models\User;
class APIController extends Controller
{
    public function index(){

        return view('index');
   }
   public function WeatherApi(request $request){
            $weather = new OpenWeather();
            $cities = $request->get('city');
            $result = [];
            foreach(explode(',',$cities) as $city){

                $report = $weather->getCurrentWeatherByCityName($city, $request->get('unit'));
                if ($report==false){
                    $errorResponse= ('Unable to fetch weather report for location '.$city);
                    return response()->json($errorResponse,400);
                 }
                $row= array("country"=>$report["location"]["country"],
                  "name"=>$report["location"]["name"],
                  "temperature"=>$report["forecast"]["temp"],
                  "temperature_min"=>$report["forecast"]["temp_min"],
                   "temperature_max"=>$report["forecast"]["temp_max"],
                   "description"=>$report["condition"]["desc"]);
             array_push($result, $row);

            }

        return response()->json($result );
        }
        public function ip_details()
        {
           // $ip = '197.248.45.195'; //For static IP address get
            $ip = '139.193.162.114'; //For static IP address get
            //$ip = request()->ip(); //Dynamic IP address get
            $data = \Location::get($ip);                
            return view('index',compact('data'));
        }
    
}
