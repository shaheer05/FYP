<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AvailableTimeSlot;
use App\TutorProfile;
use App\TutorRegisterCourse;
use App\Meeting;
use Auth;
use Image;
use App\User;
class TutorProfileController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    

	/*Functions for Tutor Avatar*/
 
    public function profile()
    {
       $id = Auth::id();
       $course= TutorRegisterCourse::where('user_id' ,'=', $id)->get();
       $meeting = Meeting::where('tutor_id', $id)->get();
        return view('tutor.profile.TutorProfile', compact('meeting'));   
    }

    public function updat_profile(Request $request){

        $validator = $request->validate([
            'price' => 'string',
            'education' => 'string',
            'location' => 'string',
            'description' => 'string',

        ]);
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/images/avatar/' . $filename ) );

            $user = Auth::user();
            $user->education = $request->input('price');
            $user->education = $request->input('education');
            $user->location = $request->input('location');
            $user->description = $request->input('description');
            $user->avatar = $filename;
            $user->save();
        }

        return redirect('tutor-profile');

    }


    /*Function for View Time slots*/

    public function view_slots()
	{
    $id = Auth::user()->id;
    $view = AvailableTimeSlot::all()->where('user_id' ,'=', $id);
	return view('tutor.profile.TutorProfile', compact('view',));
	}
}
