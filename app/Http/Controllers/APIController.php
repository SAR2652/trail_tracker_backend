<?php

namespace App\Http\Controllers;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
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
        
        $result = array($cameras, $zones);
        return response()->json(['data' => $result]);     
    }
    
    public function updateCameraStatus(Request $request)
    {
        $camera = Camera::find($request->camera_id);
        $camera->status = $request->status;
        $camera->save();
        return response()->json(['result' => 'Updated Camera Status!']);
    } 
    // public function streamVideo(Request $request)
    // {
    //     $result = shell_exec("python3 /opt/lampp/htdocs/trail_tracker_backend/app/Http/VideoStreamer/streamer.py");
        
    // }
}
