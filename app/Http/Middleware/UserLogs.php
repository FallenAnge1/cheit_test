<?php

namespace App\Http\Middleware;

use App\Models\UserLog;
use Closure;
use Illuminate\Support\Facades\Route;

class UserLogs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ipdata = json_decode(file_get_contents(
            "http://www.geoplugin.net/json.gp?ip=" . '195.242.114.110'), true);

        $actionData = explode('@', $request->route()->action['controller']);

        $logData = [
            'ip' => $request->ip(),
            'action' => $actionData[1],
            'method' => $actionData[0],
            'city' => $ipdata['geoplugin_city'],
            'country' => $ipdata['geoplugin_countryName'],
            'type' => $request->method(),
            'data' => json_encode($request->all()),
        ];

        $userLog = new UserLog;
        $userLog = $userLog->create($logData);

        return $next($request);
    }
}

