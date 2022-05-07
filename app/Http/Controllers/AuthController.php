<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Config;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(): Factory|View|Application
    {
        $config = Config::all();
        return view('auth.login', [
            'config' => $config,
        ]);
    }

    public function processLogin(Request $request): RedirectResponse
    {

        try {
            $user = Admin::query()
                ->where('username', $request->get('username'))
                ->where('password', $request->get('password'))
                ->firstOrFail();
            session()->put('id', $user->id);
            session()->put('level', $user->level);
            session()->put('name', $user->name);

            activity()
                ->useLog('xác thực')
                ->event('đăng nhập')
                ->causedBy($user)
                ->withProperties([
                    'cause_name' => session()->get('name')
                ])
                ->log('đăng nhập vào hệ thống');

            return redirect()->route('products.index');
        } catch (\Throwable $e) {
            return redirect()->route('admins.login');
        }
    }

    public function processLogout(): RedirectResponse
    {
        $name = session()->get('name');
        $id = session()->get('id');

        session()->flush();

        activity()
            ->useLog('xác thực')
            ->event('đăng xuất')
            ->causedBy(Admin::query()->where('id', $id)->first())
            ->withProperties([
                'cause_name' => $name
            ])
            ->log('đăng xuất khỏi hệ thống');

        return redirect()->route('admins.login');
    }

    public function processLockScreen(): Factory|View|Application
    {
        $admin = Admin::query()->find(session()->get('id'));

        $config = Config::all();
        return view('auth.lock_screen', [
            'admin' => $admin,
            'config' => $config,
        ]);
    }
}
