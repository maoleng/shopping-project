<?php

namespace App\Http\Controllers;

use App\Http\Requests\admin\StoreAdminRequest;
use App\Http\Requests\admin\UpdateAdminRequest;
use App\Models\Admin;
use App\Models\Config;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $search = $request->q;
        $admins = Admin::query()->where('name', 'like', '%'. $search . '%')
            ->paginate(20);
        $admins->appends(['q' => $search]);

        $config = Config::all();
        return view('admin.index', [
            'admins' => $admins,
            'config' => $config,
            'search' => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $config = Config::all();
        return view('admin.create', [
            'config' => $config,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAdminRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreAdminRequest $request): RedirectResponse
    {
        $create = Admin::query()->create($request->validated());

        $user = Admin::query()->find(session()->get('id'));
        activity()
            ->useLog('nhân viên')
            ->event('thêm')
            ->causedBy($user)
            ->performedOn($create)
            ->withProperties([
                'subject_name' => $create->name,
                'cause_name' => session()->get('name')
            ])
            ->log('thêm nhân viên');

        return redirect()->route('admins.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Admin  $admin
     * @return Application|Factory|View|RedirectResponse
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function edit(Admin $admin): Application|Factory|View|RedirectResponse
    {
        $config = Config::all();
        if (session()->get('level') === 1) {
            return view('admin.edit', [
                'admin' => $admin,
                'config' => $config,
            ]);
        }
        if (session()->get('id') !== $admin->id) {
            return redirect()->back();
        }
        return view('admin.edit', [
            'admin' => $admin,
            'config' => $config,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAdminRequest  $request
     * @param  Admin  $admin
     * @return RedirectResponse
     */
    public function update(UpdateAdminRequest $request, Admin $admin): RedirectResponse
    {
        Admin::query()->where('id', $admin->id)->update($request->validated());

        $user = Admin::query()->find(session()->get('id'));
        activity()
            ->useLog('nhân viên')
            ->event('sửa')
            ->causedBy($user)
            ->performedOn($admin)
            ->withProperties([
                'subject_name' => $admin->find($admin->id)->name,
                'cause_name' => session()->get('name')
            ])
            ->log('cập nhật thông tin');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Admin  $admin
     * @return RedirectResponse
     */
    public function destroy(Admin $admin): RedirectResponse
    {
        Admin::query()->where('id', $admin->id)->delete();

        $user = Admin::query()->find(session()->get('id'));
        activity()
            ->useLog('nhân viên')
            ->event('xóa')
            ->causedBy($user)
            ->withProperties([
                'subject_name' => $admin->name,
                'cause_name' => session()->get('name')

            ])
            ->log('sa thải nhân viên');

        return redirect()->route('admins.index');
    }

    public function lock(Admin $admin): RedirectResponse
    {
        Admin::query()->where('id', $admin->id)->update([
            'active' => 0
        ]);

        $user = Admin::query()->find(session()->get('id'));
        activity()
            ->useLog('nhân viên')
            ->event('khóa')
            ->causedBy($user)
            ->performedOn($admin)
            ->withProperties([
                'subject_name' => $admin->name,
                'cause_name' => session()->get('name')

            ])
            ->log('khóa tài khoản');

        return redirect()->back();
    }

    public function unlock(Admin $admin): RedirectResponse
    {
        Admin::query()->where('id', $admin->id)->update([
            'active' => 1
        ]);

        $user = Admin::query()->find(session()->get('id'));
        activity()
            ->useLog('nhân viên')
            ->event('mở khóa')
            ->causedBy($user)
            ->performedOn($admin)
            ->withProperties([
                'subject_name' => $admin->name,
                'cause_name' => session()->get('name')

            ])
            ->log('mở khóa tài khoản');

        return redirect()->back();
    }
}
