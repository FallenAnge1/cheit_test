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
        if(array_key_exists('controller', $request->route()->action)) {
            $actionData = explode('@', $request->route()->action['controller']);
            $actionData[0] = last(explode('\\', $actionData[0]));
        } else {
            $actionData = ['inline', 'handler'];
        }

        $requestData = $request->all();
        if (!empty($request->route('log'))) {
            $requestData['id'] = $request->route('log');
        }

        $logData = [
            'ip' => $request->ip(),
            'action' => $actionData[1],
            'method' => $actionData[0],
            'type' => $request->method(),
            'data' => json_encode($requestData),
        ];

        resolve('App\Services\UserLogService')->store($logData);

        return $next($request);
    }
}

