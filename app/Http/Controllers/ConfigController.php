<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Http\Requests\StoreConfigRequest;
use App\Http\Requests\UpdateConfigRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $config = Config::all();
        return view('config.index', [
            'config' => $config,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreConfigRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConfigRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Config  $config
     * @return \Illuminate\Http\Response
     */
    public function show(Config $config)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Config  $config
     * @return Application|Factory|View
     */
    public function edit(Config $config): View|Factory|Application
    {
        $configs = Config::all();
        return view('config.edit', [
            'config_main' => $config,
            'config' => $configs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConfigRequest  $request
     * @param  Config  $config
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Config $config)
    {
        $config_id = $config->id;

        if ($config_id === 12) {
            $link = $request->all()['value'];
            $video_id = explode("=", $link)[1];
            $value = "https://www.youtube.com/embed/" . $video_id;
        } elseif ($config_id === 10 || $config_id === 11 || $config_id === 13) {
            $link = $request->all()['value'];
            $picture_id = explode("/", $link)[5];
            $value = "https://drive.google.com/uc?id=" . $picture_id;
        } else {
            $value = $request->all()['value'];
        }

        Config::query()->where('id', $config_id)->update([
            'value' => $value
        ]);
        return redirect()->route('configs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Config  $config
     * @return \Illuminate\Http\Response
     */
    public function destroy(Config $config)
    {
        //
    }
}
