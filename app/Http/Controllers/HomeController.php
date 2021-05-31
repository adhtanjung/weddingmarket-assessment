<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {

        $role_id = Auth::user()->role_id;

        if ($role_id == '1') {
            return view('admin.dashboard');
        } else {
            return view('dashboard');
        }
        if ($role_id == '1') {
            return view('navigation-menu', compact('role'));
        }
    }

    public function render()
    {

        $role_id = Auth::user()->role_id;
        $users = User::all();

        if ($role_id == '1') {
            return view('admin.dashboard', ['users' => $users]);
        } else {
            return view('dashboard');
        }
    }

    function pdf()
    {
        $name = Auth::user()->name;
        $email = Auth::user()->email;
        $data['name'] = $name;
        $data['email'] = $email;
        $pdf = \PDF::loadView('pdf', $data);
        return $pdf->download('profile.pdf');
    }

    public function delete($id)
    {

        $user = User::find($id);
        $user->delete();
        return redirect('admin');
    }
    // public function checkRole()
    // {
    //     $role_id = Auth::user()->role_id;


    // }
}