<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Membre;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function pendingUsers()
    {
        $users = User::where('approved', false)->get();
        return view('pages_site.admin.validation_users', compact('users'));
    }

    public function approveUser(User $user)
    {
        $user->update(['approved' => true]);
        return back()->with('success', 'Utilisateur approuvé');
    }
}
