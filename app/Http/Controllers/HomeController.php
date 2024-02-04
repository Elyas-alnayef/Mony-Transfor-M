<?php


namespace App\Http\Controllers;
use App\Models\Point;
use App\Models\T_Archive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   public function index(){
    if (Auth::check()) {
        $user=Auth::user();
        if ($user->role=='Admin') {
            $points =Point::all();
            $archives = T_Archive::whereDate('created_at', now()->format('Y-m-d'))->get();
            return view('dashboard',[
                'archives'=>$archives,
                'points'=>$points,
            ]);
        }elseif($user->role=='Manager'){
            $archives=[];
            $userpoint=Point::where('manager_id',$user->id)->get();
            $Allarchives = T_Archive::whereDate('created_at', now()->format('Y-m-d'))->get();
            for ($i=0; $i <count($userpoint); $i++) {
                for ($j=0; $j <count($Allarchives) ; $j++) { 
                        $archives = T_Archive::where('user_id',$user->id)
                        ->where('sender_id',$userpoint[$i]->id)
                        ->orwhere('receiver_id',$userpoint[$i]->id)->get();
                } 
            }
            return view('dashboard',[
                'archives'=>$archives,
                'points'=>$userpoint,
            ]);
        }elseif($user->role=='User'){
            $archives = T_Archive::where('user_id',$user->id)->get();
            return view('dashboard',[
                'archives'=>$archives,
            ]);
        }
    }
    else{
        return view('auth.login');
    }
   }
}
