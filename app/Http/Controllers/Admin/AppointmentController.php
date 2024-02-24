<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('donor')->paginate(10);
        return view('admin.appointments.index', ['appointments' => $appointments]);
    }

    public function show($id)
    {
        $appointment = Appointment::with('donor')->findOrFail($id);
        return view('admin.appointments.show', ['appointment' => $appointment]);
    }

    public function edit($id)
    {
        $appointment = Appointment::with('donor')->findOrFail($id);
        return view('admin.appointments.edit', ['appointment' => $appointment]);
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        $validate = Validator::make($request->all(), [
            'date' => 'required|date',
            'time' => 'required',
            'notes' => 'nullable|string',
            'status' => 'required|in:pending,accepted,rejected',
        ]);

        if ($validate->fails()) {
            return redirect()->route('admin.appointments.edit', ['id' => $id])
                ->withErrors($validate)
                ->withInput();
        }

        $appointment->update([
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'notes' => $request->input('notes'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('admin.appointments.show', ['id' => $id])
            ->with('success', 'Appointment updated successfully!');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('admin.appointments.index')
            ->with('success', 'Appointment deleted successfully!');
    }
}
