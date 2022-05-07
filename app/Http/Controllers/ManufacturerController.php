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
        $a = Manufacturer::query()->create($array);

        $user_model = Admin::find(session()->get('id'));
        activity()
            ->causedBy($user_model)
            ->performedOn($a)
            ->log('edited');

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
        Storage::disk('public')->delete($filename);


        $array = $request->validated();
        $array['image'] = Storage::disk('public')->putFile('manufacturers', $request->file('image'));

        $manufacturer->where('id', $manufacturer->id)->update($array);
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
        return redirect()->route('manufacturers.index');
    }
}
