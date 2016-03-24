<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;

use App\Shot;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin');
    }
    
    public function indexShots(Request $request) {
        /*$shots = Shot::orderBy('created_at', 'asc') -> get();
        
        return view('admin/indexShots', [
            'shots' => $shots
        ]);*/
        
        $shots = Shot::where('user_id', $request->user()->id)->get();

    return view('admin.indexShots', [
        'shots' => $shots,
    ]);
    }
    
    public function createShotGet(Request $request) {
        return view('admin/createShot');
    }
    
    public function createShotPost(Request $request) {
         $imageR = $request -> file("image");
         $filename  = time() . '.' . $imageR -> getClientOriginalExtension();
         $path = public_path('images/' . $filename);
             
         Image::make($imageR->getRealPath())->resize(200, 200)->save($path);
            
         //$shot = new Shot();
            
        // $shot -> title = $request -> title;
         //$shot -> image = $filename;
       //  $shot -> user_id = $request -> user_id;
            
         //$shot -> save();
           /*  $request->user()->shots()->create([
        'title' => $request -> title,
        'image' => $filename
    ]);*/
    
      $request->user()->shots()->create([
        'title' => $request->title,
        'image' => $filename
      ]);
            
            
         return redirect("/");
    }
    
    public function deleteShot(Shot $shot) {
        return redirect('/');
    }
}