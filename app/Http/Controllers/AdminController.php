<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Shot;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $shots = Shot::where('user_id', $request -> user() -> id) -> get();
        
        return view('admin', [
            'shots' => $shots
        ]);
    }
        
    public function create(Request $request) 
    {
         $image = $request -> file("image");
         $filename  = time() . '.' . $image -> getClientOriginalExtension();
         $path = public_path('images/' . $filename);
             
        Image::make($image -> getRealPath()) -> resize(200, 200) -> save($path);
    
        $request->user()->shots()->create([
            'title' => $request->title,
            'image' => $filename
        ]);
        
        return redirect("/admin");
    }
    
    public function delete(Request $request, Shot $shot) {
        $shot -> delete();
        
        return redirect('/admin');
    }
}