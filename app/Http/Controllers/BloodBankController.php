<?php

namespace App\Http\Controllers;

use App\Models\BloodBank;
use Illuminate\Http\Request;

class BloodBankController extends Controller
{
    //
    public function getBloodBanks()
    {
        try {
            // Fetch blood bank data from the database
            $bloodBanks = BloodBank::all();

            // Return the data to a view
            return response()->json([ 'status' => 'success', 'bloodBanks' => $bloodBanks]);
        } catch (\Exception $e) {
            // Handle the exception if any
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    
}
