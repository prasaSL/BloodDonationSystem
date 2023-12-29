<?php

namespace App\Http\Controllers;

use App\Models\BloodBank;
use App\Models\hospitals;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
public function get_profile(){
    $user= Auth()->user();
    if($user->role == 'blood_bank_staff' && $user->blood_bank_id != null){
        $blood_bank = BloodBank::where('id', $user->blood_bank_id)->first();
        return view('users.profile')->with('blood_bank', $blood_bank);

    }
    elseif($user->role == 'hospital_staff' && $user->hospital_id != null){
        $hospital = hospitals::where('id', $user->hospital_id)->first();
        return view('users.profile')->with('hospital', $hospital);
    }
    else{
        return view('users.profile');
    }
   
   
    return view( 'users.profile');

    }


public function viewUpdateProfile ( ){
    $user= Auth()->user();
    if($user->role == 'blood_bank_staff' && $user->blood_bank_id != null){
        $blood_bank = BloodBank::where('id', $user->blood_bank_id)->first();
        return view('users.profileEdit')->with('blood_bank', $blood_bank);

    }
    elseif($user->role == 'hospital_staff' && $user->hospital_id != null){
        $hospital = hospitals::where('id', $user->hospital_id)->first();
        return view('users.profileEdit')->with('hospital', $hospital);
    }
    else{
        return view('users.ProfileEdit');
    }
   
   
    return view( 'users.profileEdit');
}

public function getLocation(Request $request)
{
    $search = $request->get('term');

    $location = BloodBank::where('b_name', $search)->value('location');

    return response()->json(['location' => $location]);
}



public function HAutocomplete(Request $request)
{
    try {
        $search = $request->get('term');

        $results = hospitals::where('name', 'LIKE', $search . '%')
            ->pluck('name');

        return response()->json($results);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

public function getHLocation(Request $request)
{
    try {
        $search = $request->get('term');

        $location = hospitals::where('name', $search)->value('location');

        return response()->json(['location' => $location]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

public function updateProfile(Request $request){
    $user=Auth()->user();
    if($user->role == 'blood_bank_staff' ){
       $blood_bank = BloodBank::where('b_name', $request->BBname)->first();
       if($blood_bank){
        $profile = User::where('id', $user->id)->update([
            'Fname' => $request->Fname,
            'Lname' => $request->Lname,
            'blood_bank_id' => $blood_bank->id,
            'national_id' => $request->NIC,
            'phone' => $request->phnNo,
            'date_of_birth' => $request->DOB,
        ]);
        if($profile){
            return redirect()->route('profile')->with('success', 'Profile Updated Successfully');
        }
        else{
            return redirect()->route('profileEdit')->with('error', 'Profile Update Failed');
        }
       }else{
        if($request->BBname!=null){
            $b=BloodBank::create([
                'b_name' => $request->BBname,
                'location' => $request->BBlocation,
            ]);

            $profile = User::where('id', $user->id)->update([
                'Fname' => $request->Fname,
                'Lname' => $request->Lname,
                'blood_bank_id' => $b->id,
                'national_id' => $request->NIC,
                'phone' => $request->phnNo,
                'date_of_birth' => $request->DOB,
            ]);
        }
       }
    
    }elseif($user->role == "hospital_staff"){
        $Hospital = hospitals::where('name', $request->hname)->first();
        if($Hospital){
            $profile = User::where('id', $user->id)->update([
                'Fname' => $request->Fname,
                'Lname' => $request->Lname,
                'hospital_id' => $Hospital->id,
                'national_id' => $request->NIC,
                'phone' => $request->phnNo,
                'date_of_birth' => $request->DOB,
            ]);
            if($profile){
                return redirect()->route('profile')->with('success', 'Profile Updated Successfully');
            }
            else{
                return redirect()->route('profileEdit')->with('error', 'Profile Update Failed');
            }
            
    }else{
        if($request->hname!=null){
            $h=hospitals::create([
                'name' => $request->hname,
                'location' => $request->hlocation,
            ]);

            $profile = User::where('id', $user->id)->update([
                'Fname' => $request->Fname,
                'Lname' => $request->Lname,
                'hospital_id' => $h->id,
                'national_id' => $request->NIC,
                'phone' => $request->phnNo,
                'date_of_birth' => $request->DOB,
            ]);
        }

    
    }
    }elseif($user->role=='donor'){
        $profile = User::where('id', $user->id)->update([
            'blood_type' => $request->blood_type,
            'health_history' => $request->health_history,
            'Fname' => $request->Fname,
            'Lname' => $request->Lname,
            'national_id' => $request->NIC,
            'phone' => $request->phnNo,
            'date_of_birth' => $request->DOB,
            'address' => $request->address,
            
        ]);
        if($profile){
            return redirect()->route('profile')->with('success', 'Profile Updated Successfully');
        }
        else{
            return redirect()->route('profileEdit')->with('error', 'Profile Update Failed');
        }
    }
    else{
        $profile = User::where('id', $user->id)->update([
            'Fname' => $request->Fname,
            'Lname' => $request->Lname,
            'national_id' => $request->NIC,
            'phone' => $request->phnNo,
            'date_of_birth' => $request->DOB,
        ]);
        if($profile){
            return redirect()->route('profile')->with('success', 'Profile Updated Successfully');
        }
        else{
            return redirect()->route('profileEdit')->with('error', 'Profile Update Failed');
        }

}
   
}
}