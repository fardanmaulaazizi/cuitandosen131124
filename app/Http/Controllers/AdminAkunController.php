<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminAkunController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $user = auth()->user();
        
        return view('admin.akun.index', compact('user'));
    }
    
    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        //
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        //
    }
    
    /**
    * Display the specified resource.
    */
    public function show(string $id)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit(string $id)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        
        $emailRules = ['required', 'string', 'email', 'max:255'];
        if ($request->email != $user->email) {
            $emailRules[] = 'unique:users';
        }
        
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => $emailRules,
            'hp' => ['required', 'min:8']
        ]);
        
        if ($validator->fails()) {
            return redirect()
            ->route('admin-akun.index')  
            ->withErrors($validator)
            ->with('error', "Error");
        }
        
        $user = User::findorfail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->hp = $request->hp;
        $user->save();
        
        return redirect('admin-akun')->with('status', 'Data Berhasil Diubah');
    }

    public function gantiPassword(Request $request, $id)
    {
        $user = User::findorfail($id);

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['password' => 'Password lama salah.']);
        }
        
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8'],
            'password_baru' => ['required', 'string', 'min:8'],
            'ulangi_password' => ['required', 'string', 'min:8']
        ]);

        if ($validator->fails()) {
            return redirect()
            ->route('admin-akun.index')  
            ->withErrors($validator)
            ->with('error', "Error");
        }

        if ($request->password_baru != $request->ulangi_password) {
            return redirect()->back()->withErrors(['ulangi_password' => 'Konfirmasi password berbeda']);
        }

        $user = User::findorfail($id);
        $user->password = Hash::make($request->password_baru);
        $user->save();
        
        return redirect('admin-akun')->with('status', 'Data Berhasil Diubah');
    }
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy(string $id)
    {
        //
    }
}
