<?php

namespace App\Http\Controllers;

use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::paginate(5);

        // return view('users.index', compact('users'));
        return view('users.index');
    }

    // public function create()
    // {
    //     return view('users.create');
    // }

    // public function store(Request $request)
    // {
    //     User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password),
    //         'role' => '0',
    //     ]);

    //     Alert::success('Congrats!', 'Data berhasil disimpan!');
    //     // toast('Your Post as been submited!','success');
    //     // session()->flash('success', 'Data berhasil disimpan');

    //     return redirect()->route('users.index');
    // }

    // public function edit($id)
    // {
    //     return view('users.edit',[
    //         'user' => User::findOrFail($id),
    //     ]);
    // }

    // public function update(Request $request, $id)
    // {
    //     $user = User::find($id);
    //     $user->update([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //     ]);

    //     Alert::success('Berhasil!', 'Data berhasil diupdate!');
    //     // session()->flash('success', 'Data berhasil diupdate');

    //     return redirect()->route('users.index');
    // }

    // public function destroy($id)
    // {
    //     $user = User::find($id);
    //     $user->delete();

    //     Alert::success('Berhasil!', 'Data berhasil dihapus!');
    //     // toast('Data berhasil dihapus!','success');
    //     // session()->flash('danger', 'Data berhasil dihapus');

    //     return redirect()->route('users.index');
    // }

    public function user_json()
    {
        $data = User::get();
        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', function ($data) {
                    $button = " <button data-toggle='tooltip' title='Edit' class='edit_users btn btn-warning btn-xs btn-flat' id='" . $data->id . "' ><i class='far fa-edit'></i></button> <br> <br>";
                    $button .= " <button title='Hapus' data-toggle='tooltip' type='submit' class='hapus_users btn btn-xs btn-danger btn-flat' id='" . $data->id . "' ><i class='fas fa-trash-alt'></i></button>";
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return Datatables::of($data)->make(true);
    }

    public function store_users(Request $request)
    {
        $data_store = new User();
        $data_store->name = $request->nama;
        $data_store->email = $request->email;
        $data_store->role = $request->role;
        $data_store->password = bcrypt($request->password);
        // $data_store->paassword_conf = $request->paassword_conf;
        $data_store->save();
        // if ($simpan_user == 200) {
        //     return response()->json(['data' => $data, 'text' => 'data berhasi disimpan']);
        // } else {
        //     return response()->json(['data' => $data, 'text' => 'data berhasi disimpan']);
        // }
    }

    public function edits_users(Request $request)
    {
        $id = $request->id;
        $data = User::find($id);
        return response()->json(['data' => $data]);
    }

    public function updates_users(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        $datas_users = [
            'name' => $request->nama,
            'email' => $request->email,
            // 'password' => bcrypt($request->password),
            'role' => $request->role
        ];
        $data = User::find($id);
        $data->update($datas_users);
    }

    public function hapus_users(Request $request)
    {
        $id = $request->id;
        $data = User::find($id);
        $data->delete();
    }

}
