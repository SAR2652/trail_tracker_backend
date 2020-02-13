<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Camera;
use App\Zone;
use App\Http\VideoStreamer\VideoStream;

class APIController extends Controller
{
    public function getCameraList(Request $request)
    {
        $cameras = Camera::all();
        $zones = array();

        foreach($cameras as $camera)
        {
            $zones[] = Zone::select('zone_name')->where('zone_id', $camera['zone_id'])->get();
        }
        
        return array($cameras, $zones);            
    }
    
    public function streamVideo(Request $request)
    {
        {
            $video_path = 'H:\xampp\htdocs\trail_tracker_backend\resources\videos\sample.mp4'; 
            $tmp = new VideoStream($video_path);
            $tmp->start();
        }
    }
}
