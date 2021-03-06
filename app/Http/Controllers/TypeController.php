<?php

namespace App\Http\Controllers;

use App\Http\Requests\type\StoreTypeRequest;
use App\Http\Requests\type\UpdateTypeRequest;
use App\Models\Admin;
use App\Models\Config;
use App\Models\Subtype;
use App\Models\Type;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $search = $request->q;
        $types = Type::query()
            ->where('name', 'like', '%'. $search . '%')
            ->paginate(20);
        $types->appends(['q' => $search]);


        $config = Config::all();
        return view('type.index', [
            'types'  => $types,
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
        return view('type.create', [
            'config' => $config,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTypeRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreTypeRequest $request): RedirectResponse
    {
        $create = Type::query()->create($request->validated());

        $user = Admin::query()->find(session()->get('id'));
        activity()
            ->useLog('thể loại')
            ->event('thêm')
            ->causedBy($user)
            ->performedOn($create)
            ->withProperties([
                'subject_name' => $create->name,
                'cause_name' => session()->get('name')
            ])
            ->log('thêm thể loại mới');

        return redirect()->route('types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Type  $type
     * @return Application|Factory|View
     */
    public function edit(Type $type): View|Factory|Application
    {
        $config = Config::all();
        return view('type.edit', [
            'type' => $type,
            'config' => $config,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateTypeRequest  $request
     * @param  Type  $type
     * @return RedirectResponse
     */
    public function update(UpdateTypeRequest $request, Type $type): RedirectResponse
    {
        Type::query()->where('id', $type->id)->update($request->validated());

        $user = Admin::query()->find(session()->get('id'));
        activity()
            ->useLog('thể loại')
            ->event('sửa')
            ->causedBy($user)
            ->performedOn($type)
            ->withProperties([
                'subject_name' => Type::query()->where('id', $type->id)->first()->name,
                'cause_name' => session()->get('name')
            ])
            ->log('cập nhật thông tin thể loại');

        return redirect()->route('types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Type  $type
     * @return RedirectResponse
     */
    public function destroy(Type $type): RedirectResponse
    {
        Type::query()->where('id', $type->id)->delete();

        $user = Admin::query()->find(session()->get('id'));
        activity()
            ->useLog('thể loại')
            ->event('xóa')
            ->causedBy($user)
            ->withProperties([
                'subject_name' => $type->name,
                'cause_name' => session()->get('name')
            ])
            ->log('xóa thể loại');

        return redirect()->route('types.index');
    }

    public function detail(Type $type): Factory|View|Application
    {
        $subtypes = Subtype::query()->where('type_id', $type->id)->get();

        $config = Config::all();
        return view('subtype.index', [
            'subtypes' => $subtypes,
            'type_name' => $type->name,
            'config' => $config,
        ]);
    }
}
