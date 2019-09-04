<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UpdateProProfile;

class UserController extends Controller
{
    public function edit()
    {
        $user = auth()->user();

        if (!$user->is_pro) {
            return redirect('/');
        }

        $data = [
            'user' => $user,
            'useBlackHeader' => true,
        ];

        return view('user.edit', $data);
    }

    public function show()
    {
        return view('user.show');
    }

    public function update(UpdateProProfile $request)
    {
        $user = auth()->user();
        $user->fill($request->all());
        $user->save();

        if ($input = $_FILES['avatar']['tmp_name']) {
            $output = public_path("avatars/avatar-pro-{$user->id}.png");
            imagepng(imagecreatefromstring(file_get_contents($input)), $output);
        }

        return redirect('/profile/edit')->with(
            'status',
            'Your profile has been successfully updated!');
    }
}
