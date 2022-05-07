<?php

namespace App\Http\Controllers;

use App\Http\Requests\manufacturer\StoreManufacturerRequest;
use App\Http\Requests\manufacturer\UpdateManufacturerRequest;
use App\Models\Admin;
use App\Models\Config;
use App\Models\Manufacturer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $search = $request->q;
        $manufacturers = Manufacturer::query()->where('name', 'like', '%'. $search . '%')->select('*')->paginate(20);
        $manufacturers->appends(['q' => $search]);

        $config = Config::all();
        return view('manufacturer.index', [
            'manufacturers' => $manufacturers,
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
        return view('manufacturer.create', [
            'config' => $config,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreManufacturerRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreManufacturerRequest $request): RedirectResponse
    {
        $path = Storage::disk('public')->putFile('manufacturers', $request->file('image'));
        $array = $request->validated();
        $array['image'] = $path;
        $create = Manufacturer::query()->create($array);

        $user = Admin::query()->find(session()->get('id'));
        activity()
            ->useLog('nhà cung cấp')
            ->event('thêm')
            ->causedBy($user)
            ->performedOn($create)
            ->withProperties([
                'subject_name' => $create->name,
                'cause_name' => session()->get('name')
            ])
            ->log('thêm nhà cung cấp mới');

        return redirect()->route('manufacturers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Manufacturer  $manufacturer
     * @return void
     */
    public function show(Manufacturer $manufacturer): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Manufacturer  $manufacturer
     * @return Application|Factory|View
     */
    public function edit(Manufacturer $manufacturer): View|Factory|Application
    {
        $config = Config::all();
        return view('manufacturer.edit',[
            'manufacturer' => $manufacturer,
            'config' => $config,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateManufacturerRequest  $request
     * @param  Manufacturer  $manufacturer
     * @return RedirectResponse
     */
    public function update(Manufacturer $manufacturer, UpdateManufacturerRequest $request): RedirectResponse    {
        $filename = $manufacturer->image;
        $array = $request->validated();

        if (isset($request->image)) {
            Storage::disk('public')->delete($filename);
            $array['image'] = Storage::disk('public')->putFile('manufacturers', $request->file('image'));
        }

        Manufacturer::query()->where('id', $manufacturer->id)->update($array);
        Manufacturer::query()->where('id', $manufacturer->id)->first();

        $user = Admin::query()->find(session()->get('id'));
        activity()
            ->useLog('nhà cung cấp')
            ->event('sửa')
            ->causedBy($user)
            ->performedOn($update)
            ->withProperties([
                'subject_name' => $update->name,
                'cause_name' => session()->get('name')
            ])
            ->log('cập nhật thông tin nhà cung cấp');

        return redirect()->route('manufacturers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Manufacturer  $manufacturer
     * @return RedirectResponse
     */
    public function destroy(Manufacturer $manufacturer): RedirectResponse
    {
        $filename = $manufacturer->image;
        Storage::disk('public')->delete($filename);
        $manufacturer->delete();

        $user = Admin::query()->find(session()->get('id'));
        activity()
            ->useLog('nhà cung cấp')
            ->event('xóa')
            ->causedBy($user)
            ->withProperties([
                'subject_name' => $manufacturer->name,
                'cause_name' => session()->get('name')
            ])
            ->log('xóa nhà cung cấp');

        return redirect()->route('manufacturers.index');
    }
}
