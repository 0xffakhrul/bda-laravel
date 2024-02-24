<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $donorInformation = $user->donor;
        return view('admin.users.edit', ['user' => $user, 'donorInformation' => $donorInformation]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'role' => 'required|string|max:255',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->password = bcrypt('password');

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string',
            'role' => 'required|in:admin,donor',
            'gender' => 'required_if:role,donor|in:male,female',
            'blood_type' => 'required_if:role,donor|in:A+,A-,B+,B-,O+,O-,AB+,AB-',
            'contact_number' => 'required_if:role,donor|string',
        ]);

        if ($validate->fails()) {
            return redirect()->route('admin.users.edit', ['id' => $id])
                ->withErrors($validate)
                ->withInput();
        }

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
        ]);

        // Update donor-related information
        if ($user->role === 'donor') {
            $donorInformation = $user->donor ?? new Donor();
            $donorInformation->gender = $request->input('gender');
            $donorInformation->blood_type = $request->input('blood_type');
            $donorInformation->contact_number = $request->input('contact_number');

            $user->donor()->save($donorInformation);
        }

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
    }
}
