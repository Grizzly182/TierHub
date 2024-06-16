<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Template;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    public function profile(User $user): View
    {
        $templates = $user->templates();
        $tierlists = $user->tierlists();
        return view('profile.index', compact('user', 'templates', 'tierlists'));
    }

    public function edit(User $user): View
    {
        Gate::authorize('update-user', $user);
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        Gate::authorize('update-user', $user);
        $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'avatar' => ['nullable', 'file'],
        ]);
        try {
            $data = [];
            $data['password'] = $request->password ? bcrypt($request->password()) : $user->password;

            if ($request->hasFile('avatar')) {
                $data['avatar'] = Image::store($request->file('avatar'));
            }

            $user->update($data);
        } catch (Exception $ex) {
            dd($ex->getMessage());
        }

        return redirect()->route('profile', $user);
    }

    public function created(User $user): void
    {
        $user->assignRole('User');
    }

    public function destroy(User $user): RedirectResponse
    {
        if(!Auth::user()->can('ban user')){
            abort(403);
        }
        $user->delete();

        return redirect()->route('home');
    }
}
