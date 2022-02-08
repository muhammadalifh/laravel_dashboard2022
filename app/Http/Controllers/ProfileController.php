<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        if ($request->password) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }

        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        Alert::success('Berhasil!', 'Data berhasil diupdate!');
        return redirect()->back();
        // return redirect()->back()->with('success', 'Profile updated.');
    }
}
