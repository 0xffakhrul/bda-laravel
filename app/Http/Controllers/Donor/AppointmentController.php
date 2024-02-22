<?php

namespace App\Http\Controllers\Donor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->donor) {
                $appointments = $user->donor->appointments;
                return view('donor.appointments.index', ['appointments' => $appointments]);
            }
        }

        return view('donor.appointments.index', ['appointments' => []]);
    }

    public function create()
    {
        return view('donor.appointments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'notes' => 'required',
        ]);

        $user = Auth::user();

        if ($user->donor) {
            $appointment = new Appointment([
                'donor_id' => $user->donor->donor_id,
                'date' => $request->input('date'),
                'time' => $request->input('time'),
                'notes' => $request->input('notes'),
                'status' => 'pending',
            ]);

            $appointment->save();

            return redirect()->route('donor.appointments.index')->with('success', 'Appointment created successfully!');
        } else {
            return redirect()->route('donor.appointments.index')->with('error', 'Donor not found for the user.');
        }
    }
}
