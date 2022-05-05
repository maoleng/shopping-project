<?php

    namespace App\Http\Controllers;

    use App\Models\Config;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;

    class DashboardAdmin extends Controller
    {
        public function index(): Factory|View|Application
        {
            $config = Config::all();
            return view('home_page-admin', [
                'config' => $config,
            ]);
        }


    }
