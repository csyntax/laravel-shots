<?php


namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;

use Illuminate\Http\Request;

use App\Shot;

class HomeController extends Controller
{
    public function index() {
        $shots = Shot::orderBy('created_at', 'asc')->get();
        
        return view('index', [
            "shots" => $shots
        ]);
    }
    
    public function create_shot_get() {
        return view('create');
    }
    
    public function create_shot_post(Request $request) {
        //if (Request::hasFile('image')) {
            $image = $request->file("image");
                $filename  = time() . '.' . $image->getClientOriginalExtension();
            
             $path = public_path('images/' . $filename);
             
             Image::make($image->getRealPath())->resize(200, 200)->save($path);
             
             $shot = new Shot();
        
        
        
            $shot->image = $filename;
        
            $shot->save();
       //}
        
        
        
        return redirect("/");
    }
}
