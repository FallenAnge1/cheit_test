<?php

namespace App\Repositories;

use App\Models\UserLog;

class UserLogRepository
{
    public function index() {
        return UserLog::all();
    }

    public function show($id) {
        return UserLog::find($id);
    }

    public function store($request) {
        $log = new UserLog;
        $fields = array_only($request, $log->getFillable());

        $log = $log->create($fields);

        return $log;
    }

    public function update($id, $request) {
        $log = UserLog::find($id);

        if (empty($log)) {
            return null;
        }

        $fields = array_only($request, $log->getFillable());

        $log->update($fields);

        return $log;
    }

    public function destroy($id) {
        $log = UserLog::find($id);
        if (empty($log)) {
            return null;
        }

        $log->delete();
        return 204;
    }

    public function rules() {
        return UserLog::$rules;
    }
}
