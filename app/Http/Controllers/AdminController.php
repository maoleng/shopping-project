<?php

namespace App\Http\Controllers;

use App\Http\Requests\admin\StoreAdminRequest;
use App\Http\Requests\admin\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $admins = Admin::all();
        return view('admin.index', [
            'admins' => $admins
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAdminRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreAdminRequest $request): RedirectResponse
    {
        Admin::query()->create($request->validated());
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
     * @return Application|Factory|View
     */
    public function edit(Admin $admin): View|Factory|Application
    {
        return view('admin.edit', [
            'admin' => $admin
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
        return redirect()->route('admins.index');
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
        return redirect()->route('admins.index');
    }

    public function lock(Admin $admin): RedirectResponse
    {
        Admin::query()->where('id', $admin->id)->update([
            'active' => 0
        ]);
        return redirect()->route('admins.index');
    }

    public function unlock(Admin $admin): RedirectResponse
    {
        Admin::query()->where('id', $admin->id)->update([
            'active' => 1
        ]);
        return redirect()->route('admins.index');
    }
}
