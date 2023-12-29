<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use App\Models\BloodBank;
use App\Models\notification;
use GuzzleHttp\Psr7\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Carbon;
use League\CommonMark\Node\Block\Document;

class userController extends Controller
{
   public function getBloodBanks()
    {
        $bloodBanks = BloodBank::all(); 
        
        
        return compact('bloodBanks');
        
    }
    public function index()
    {
        $donor = Auth::user() && Auth::user()->role == 'donor' ? User::find(Auth::user()->id) : null;
    
        if (Auth::check()) {
            if (Auth::user()->role == 'donor') {
                
                if(Auth::user()->eligible_status == false && Auth::user()->last_donation_date != null) {
                    $this->updateEligibilityStatus(Auth::user()->id);
                }

                $bloodBanks = BloodBank::all();
                
                
                return view('dashboards.do_dash')->with(compact('bloodBanks', 'donor'));
            } elseif (Auth::user()->role == 'hospital_staff') {
                return view('dashboards.HS_dash');
            } elseif (Auth::user()->role == 'blood_bank_staff') {
                return view('dashboards.BBS_dash');
            } elseif (Auth::user()->role == 'lab_technician') {
                return view('dashboards.LT_dash');
            } elseif (Auth::user()->role == 'recipient') {
                return view('dashboards.RE_dash');
            } elseif (Auth::user()->role == 'volunteer_coordinator') {
                return view('dashboards.VC_dash');
            } elseif (Auth::user()->role == 'dispatcher') {
                return view('dashboards.DI_dash');
            } elseif (Auth::user()->role == 'auditor') {
                return view('dashboards.Au_dash');
            } elseif (Auth::user()->role == 'administrator') {
                return view('dashboards.ad_dash');
            }
        } else {
            return view('dashboards.g_dash', compact('donor'));
        }
    }

    public function login()
    {
        return view('users.user_login');
    }




    public function D_register()
    {
        return view('users.donor_registration');
    }




    public function DRegistration(Request $request)
    {
        try {
            $request->validate([
                'Fname' => 'required',
                'Lname' => 'required',
                'NIC' => 'required',
                'dob' => 'required',
                'phnNo' => 'required',
                'email' => 'required|email|unique:users,email',
                'address' => 'required',
                'password1' => 'required|min:6',
                'password2' => 'required|min:6|same:password1',

            ]);

            $data = [
                'Fname' => $request->Fname,
                'Lname' => $request->Lname,
                'national_id' => $request->NIC,
                'date_of_birth' => $request->dob,
                'phone_number' => $request->phnNo,
                'email' => $request->email,
                'address' => $request->address,
                'password' => Hash::make($request->password1),
                'role' => 'donor',
                'location' => 'colombo',
                'blood_type' => '',
                'health_history' => $request->hh,
            ];

            $user = User::create($data);

            // Redirect to a success page or any other logic you need
            return redirect()->route('login')->with('success', 'Registration successful!');
            } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (\Exception $e) {
            // Handle other exceptions
            return redirect()->back()->with('error', 'An error occurred during registration. Please try again.');
        }

    }


    function loginTo(Request $request)
{
    try {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        Auth::login($user);

        // Redirect to the appropriate dashboard based on the user's role
        return redirect()->route('home');
    } catch (ValidationException $e) {
        // Handle validation errors
        return redirect()->back()->withErrors($e->validator->errors())->withInput();
    } catch (\Exception $e) {
        // Handle other exceptions
        return redirect()->back()->with('error', 'An error occurred during login. Please try again.');
    }
}



    function logout()
    {
        Session::flash('success', 'Logout successful!');
        auth()->logout();
        return redirect()->route('login');
    }

    function updateEligibilityStatus($donorId) {
        $donor = User::find($donorId);
    
        if ($donor) {
            $lastDonationDate = strtotime($donor->last_donation_date);
            $currentDate = time();
            $differenceInMonths = floor(($currentDate - $lastDonationDate) / (30 * 24 * 60 * 60));
    
            // Check if it has been at least 3 months since the last donation
            if ($differenceInMonths >= 3) {
                $donor->eligible_status = true;
                $donor->save();
            
            }
        }
    }
    public function getRegisterForm( ){

        return view('users.staff_registration');
    }

    public function registerAll(Request $request){

        try {
            $request->validate([
                'Fname' => 'required',
                'Lname' => 'required',
                'NIC' => 'required',
                
                'phnNo' => 'required',
                'email' => 'required|email|unique:users,email',
                'role' => 'required',
                'password1' => 'required|min:6',
                'password2' => 'required|min:6|same:password1',

            ]);

            

            $data = [
                'Fname' => $request->Fname,
                'Lname' => $request->Lname,
                'national_id' => $request->NIC,
                
                'phone_number' => $request->phnNo,
                'email' => $request->email,
               
                'password' => Hash::make($request->password1),
                'role' => $request->role,
              
               
            ];

            $user = User::create($data);

          
       // Redirect to a success page or any other logic you need
       return redirect()->route('staff_registration')->with('success', 'Registration successful!');
    } catch (\Exception $e) {
        dd($e->getMessage()); // Add this line to display the exception message
        return redirect()->back()->with('error', 'An error occurred during registration. Please try again.');
    }

    
    }


    public function PostNotification(Request $request){

      
            $request->validate([
                'sender_id' => 'required', 
                'title' => 'required',
                'body' => 'required',
                'receiver_type' => 'required',
                'emergency' => 'required',      
            ]);
            
            $data = [
                'title' => $request->title,
                'body' => $request->body,
                'receiver_type' =>$request->receiver_type,
                'emergency' => $request->emergency,
                'sender_id' => $request->sender_id,
                'expiry_date' => $request->expiry_date,

               
            ];

            $notification =notification::create($data);

          
            if ($notification) {
                return response()->json([
                    'success' => true,
                    'message' => 'Notification sent successfully!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Notification sending failed!',
                ], 500);
            }
        }
    
    
       

    public function getNotification(){
        $id = Auth::user()->id;
        $notifications = notification::where('sender_id', $id)->orderBy('created_at', 'desc')->get();
        if($notifications->isEmpty()) {
            $notifications = [];
        }

       return view('pages.notificationForm')->with(compact('notifications'));
    }


    

     public function showNotification(){
        try {
            $receiverType = Auth::user()->role;
    
            $notifications = Notification::join('users', 'sender_id', '=', 'users.id')->orderBy('notifications.created_at', 'desc')
            ->where(function ($query) use ($receiverType) {
                $query->where('receiver_type', $receiverType)
                    ->orWhere('receiver_type', 'all');
            })
            ->where('expiry_date', '>=', now())
            ->get();
    
            return view('pages.notifications')->with(['notifications' => $notifications]);
    
        } catch (QueryException $e) {
            // Handle query exception
            // You can log the error, display a user-friendly message, or perform other actions
            return view('pages.notifications')->with('error', 'An error occurred while fetching notifications.');
        }
    }

    public function delateNotification($id){
        $notification = notification::find($id);
        $notification->delete();
        return redirect()->back()->with('success', 'Notification deleted successfully!');
    }
}
       


