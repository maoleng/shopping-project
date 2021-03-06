<?php

    namespace App\Http\Controllers;

    use App\Models\Config;
    use Spatie\Activitylog\Models\Activity;

    class ActivityController extends Controller
    {
        public function index()
        {
            $activities = Activity::query()->orderBy('id', 'DESC')->paginate(20);

            $config = Config::all();
            return view('activity_log', [
                'activities' => $activities,
                'config' => $config,
            ]);
        }

    }
