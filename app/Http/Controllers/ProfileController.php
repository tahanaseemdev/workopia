<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // @desc Update profile info
    // PUT /profile
    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'avatar' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        $user->save();
        // $user->update($validatedData);
        return redirect()->route('dashboard')->with('success', 'Profile info updated!');
    }
}
