<?php

namespace App\Http\Controllers;

use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => '0',
        ]);

        Alert::success('Congrats!', 'Data berhasil disimpan!');
        // toast('Your Post as been submited!','success');
        // session()->flash('success', 'Data berhasil disimpan');

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        return view('users.edit',[
            'user' => User::findOrFail($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        Alert::success('Berhasil!', 'Data berhasil diupdate!');
        // session()->flash('success', 'Data berhasil diupdate');

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Alert::success('Berhasil!', 'Data berhasil dihapus!');
        // toast('Data berhasil dihapus!','success');
        // session()->flash('danger', 'Data berhasil dihapus');

        return redirect()->route('users.index');
    }
}
