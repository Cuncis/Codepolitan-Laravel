<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createProfile(Request $request)
    {
        $user = User::find(1);

        $user->profile()->create([
            'phone' => '123567890',
            'address' => '123 Main St, Anytown, USA',
        ]);

        return $user;
        // $user = User::findOrFail($userId);

        // $profile = new Profile([
        //     'phone' => $request->input('phone'),
        //     'address' => $request->input('address'),
        // ]);

        // $user->profile()->save($profile);

        // return response()->json(['message' => 'Profile created successfully.', 'profile' => $profile], 201);
    }

    public function userProfile()
    {
        $user = User::find(1);

        // return $user->profile;
        // return $user->load('profile');
        return $user;
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(1);

        $user->profile()->update([
            'phone' => '0987654321',
            'address' => '456 Another St, Sometown, USA',
        ]);

        return $user;
    }

    public function deleteProfile()
    {
        $user = User::find(1);

        $user->profile()->delete();

        return response()->json(['message' => 'Profile deleted successfully.']);
    }
}
