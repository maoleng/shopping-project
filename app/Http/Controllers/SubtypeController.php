<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\subtype\StoreSubtypeRequest;
    use App\Http\Requests\subtype\UpdateSubtypeRequest;
    use App\Models\Admin;
    use App\Models\Config;
    use App\Models\Subtype;
    use App\Models\Type;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;

//    use App\Http\Requests\StoreSubtypeRequest;
//    use App\Http\Requests\UpdateSubtypeRequest;

    class SubtypeController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return Application|Factory|View
         */
        public function index(Type $type, Request $request): View|Factory|Application
        {
            $search = $request->q;

            $subtypes = Subtype::query()
                ->where('name', 'like', '%'. $search . '%')
                ->where('type_id', $type->id)
                ->paginate(20);
            $subtypes->appends(['q' => $search]);


            $config = Config::all();
            return view('subtype.index', [
                'subtypes' => $subtypes,
                'type' => $type,
                'config' => $config,
                'search' => $search
            ]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Application|Factory|View
         */
        public function create(Type $type)
        {
            $config = Config::all();
            return view('subtype.create', [
                'type' => $type,
                'config' => $config,
            ]);
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \App\Http\Requests\StoreSubtypeRequest  $request
         * @return RedirectResponse
         */
        public function store(StoreSubtypeRequest $request, Type $type)
        {
            $data = $request->validated();
            $data['type_id'] = $type->id;
            $create = Subtype::query()->create($data);

            $user = Admin::query()->find(session()->get('id'));
            activity()
                ->useLog('danh mục')
                ->event('thêm')
                ->causedBy($user)
                ->performedOn($create)
                ->withProperties([
                    'subject_name' => $create->name,
                    'cause_name' => session()->get('name')
                ])
                ->log('thêm danh mục vào thể loại ' . $type->name);

            return redirect()->route('subtypes.index', ['type' => $type->id]);
        }

        /**
         * Display the specified resource.
         *
         * @param  Subtype  $Subtype
         * @return Response
         */
        public function show(Subtype $Subtype)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  Subtype  $Subtype
         * @return Application|Factory|View
         */
        public function edit(Subtype $Subtype): View|Factory|Application
        {
            $config = Config::all();

            $type = Type::query()->find($Subtype->type_id);
            return view('subtype.edit', [
                'subtype' => $Subtype,
                'type' => $type,
                'config' => $config,
            ]);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  UpdateSubtypeRequest  $request
         * @param  Subtype  $Subtype
         * @return RedirectResponse
         */
        public function update(UpdateSubtypeRequest $request, Subtype $subtype): RedirectResponse
        {
            Subtype::query()->where('id', $subtype->id)->update($request->validated());

            $user = Admin::query()->find(session()->get('id'));
            activity()
                ->useLog('danh mục')
                ->event('sửa')
                ->causedBy($user)
                ->performedOn($subtype)
                ->withProperties([
                    'subject_name' => Subtype::query()->where('id', $subtype->id)->first()->name,
                    'cause_name' => session()->get('name')
                ])
                ->log('cập nhật thông tin danh mục');

            return redirect()->route('subtypes.index', ['type' => $subtype->type_id]);
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  Subtype  $Subtype
         * @return RedirectResponse
         */
        public function destroy(Subtype $subtype): RedirectResponse
        {
            Subtype::query()->where('id', $subtype->id)->delete($subtype);

            $user = Admin::query()->find(session()->get('id'));
            activity()
                ->useLog('danh mục')
                ->event('xóa')
                ->causedBy($user)
                ->withProperties([
                    'subject_name' => $subtype->name,
                    'cause_name' => session()->get('name')
                ])
                ->log('xóa danh mục');

            return redirect()->route('subtypes.index', ['type' => $subtype->type_id]);
        }
    }
