<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeEmailRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\Users\CreateRequest;
use App\Http\Requests\Users\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function list(Request $request)
    {
        $SearchName = ($request->input('name') == 'all' ? null : $request->input('name'));
        $sort = ($request->input('sort') == 'asc' ? 'asc' : 'desc');

        $users = User::when($SearchName, function ($query) use ($SearchName) {
            return $query->searchByName($SearchName);
        })
                    ->orderBy('id', $sort)
                    ->paginate(20);

        return view('admin.users.list', ['users' => $users]);
    }

    public function indexEdit($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = (int) $request->has('role');
        $user->save();

        return redirect()->route('users.edit', $id)->with('success', __('update successful'));
    }

    public function indexAdd()
    {
        return view('admin.users.add');
    }

    public function create(CreateRequest $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->has('role');
        $user->save();

        return redirect()->route('users.list');
    }

    public function account()
    {
        return view('user.account.index');
    }

    public function accountAdmin()
    {
        return view('admin.account.index');
    }

    public function changeAdminEmail(ChangeEmailRequest $request)
    {
        $email = $request->email;
        User::where('id', Auth::id())->update(['email' => $email]);
        return redirect()->route('admin.account')->with('success-email', __('Change email successful.'));
    }

    public function changeAdminPassword(ChangePasswordRequest $request)
    {
        $currentPassword = $request->current_password;
        $newPassword = $request->password;
        if (Hash::check($currentPassword, Auth::user()->password)) {
            User::where('id', Auth::id())->update(['password' => Hash::make($newPassword)]);
        }
        {
            return redirect()->route('admin.account')->with('error', __('Current password is not correct.'));
        }
        return redirect()->route('admin.account')->with('success-password', __('Change password successful.'));
    }

    public function changeEmail(ChangeEmailRequest $request)
    {
        $email = $request->email;
        User::where('id', Auth::id())->update(['email' => $email]);
        return redirect()->route('user.account')->with('success-email', __('Current password is not correct.'));
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $currentPassword = $request->current_password;
        $newPassword = $request->password;
        if (Hash::check($currentPassword, Auth::user()->password)) {
            User::where('id', Auth::id())->update(['password' => Hash::make($newPassword)]);
        }
        {
            return redirect()->route('account')->with('error', __('Change password error.'));
        }
        return redirect()->route('user.account')->with('success-password', __('Change password successful.'));
    }
}
