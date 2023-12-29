<?php

namespace App\Http\Controllers;

use App\Models\BloodBank;
use App\Models\DSchedule;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;

class donorController extends Controller
{
    public function schedule($user_id){

        $schedule = DSchedule::find($user_id);
        return view('pages.donor_schedule')->with('schedule', $schedule);
    }


    
    public function updateLocation(Request $request)
    {
        $request->validate([
            'location' => 'required',
        ]);
    
        $user = auth()->user(); // Assuming the user is authenticated
    
        if ($user) {
            $user->location = $request->location;
            User::where('id', $user->id)->update(['location' => $request->location]); // Update the user's location in the database
    
            return response()->json(['success' => true, 'location' => $user->location]);
        }
    
        return response()->json(['success' => false, 'message' => 'User not found.']);
    }

    public function scheduleDonation(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'center' => 'required',
        ]);

    

        $bloodBank = BloodBank:: where('b_name', $request->center)->first();


if (!$bloodBank) {
    return response()->json(['success' => false, 'message' => 'Blood Bank not found.']);
}
    
       $data = [
            'donor_id' => auth()->user()->id,
            'blood_bank_id' => $bloodBank->id,
            'blood_group' => auth()->user()->blood_group,
            'date' => $request->date,
            'time' => $request->time,
            'donated' => false,
            
        ];
    
        $schedule = DSchedule::create($data);

        $s = DSchedule::where('donor_id', auth()->user()->id)->where('donated',0)->first();

        $b = BloodBank::where('id', $s->blood_bank_id)->first();
    
        if ($schedule) {
            return response()->json(['success' => true, 'message' => 'Schedule created successfully.', 'scheduless' => $s, 'bloodBank' => $b]);
        }
    
        return response()->json(['success' => false, 'message' => 'Schedule could not be created.']);

       
    
        return response()->json(['success' => false, 'message' => 'User not found.']);
    }

    public function lordshedule()
    {
        $s = DSchedule::where('donor_id', auth()->user()->id)->where('donated',0)->first();


      

        if($s){
            $b = BloodBank::where('id', $s->blood_bank_id)->first();
            return response()->json(['success' => true, 'sch' => $s, 'blo' => $b]);
        }
        else{
            return response()->json(['success' => false, 'message' => 'no schedule found.']);
        }            

}
public function delateSchedule(Request $id)
{

    $schedule = DSchedule::where('donor_id', $id->user_id)->where('donated',0)->first();;

    $schedule->delete();
    if ($schedule) {
        return response()->json(['success' => true, 'message' => 'Schedule deleted successfully.']);
    }
    else{
        return response()->json(['success' => false, 'message' => 'Schedule could not be deleted.']);
   }
  }

  public function autocomplete(Request $request)
    {
        $search = $request->get('term');

        $results = BloodBank::where('b_name', 'LIKE', $search . '%')
            ->pluck('b_name'); 

        return response()->json($results);
    }
}