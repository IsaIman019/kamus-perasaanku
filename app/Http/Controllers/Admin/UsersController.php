<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.admin.master-users.render.index', compact('users'));
    }

    public function create()
    {
        return view('pages.admin.master-users.render.create');
    }


    public function store(Request $request)
    {
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
                'status' => $request->status,
            ]);
            return redirect()
                ->route('admin.master-users.index')
                ->with('success', 'User berhasil ditambahkan.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }


    public function show(User $user, $id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.master-users.render.show', compact('user'));
    }

    public function edit(User $user, $id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.master-users.render.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->filled('password') ? bcrypt($request->password) : $user->password,
                'role' => $request->role,
                'status' => $request->status,
            ]);

            return redirect()
                ->route('admin.master-users.index')
                ->with('success', 'User berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Update User Error: ' . $e->getMessage());
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui user: ' . $e->getMessage());
        }
    }


    public function destroy(User $user, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.master-users.index')
            ->with('success', 'User berhasil dihapus.');
    }
}
