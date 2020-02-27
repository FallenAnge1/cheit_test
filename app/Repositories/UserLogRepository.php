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

    private function getLocation(&$request) {
       $ipdata = json_decode(file_get_contents(
            "http://www.geoplugin.net/json.gp?ip=" . $request['ip']), true);

       $request['city'] = $ipdata['geoplugin_city'];
       $request['country'] = $ipdata['geoplugin_countryName'];
    }

    public function store($request) {
        $log = new UserLog;

        $fields = array_only($request, $log->getFillable());

        $this->getLocation($fields);

        $log = $log->create($fields);

        return $log;
    }

    public function update($id, $request) {
        $log = UserLog::find($id);

        if (empty($log)) {
            return null;
        }

        $fields = array_only($request, $log->getFillable());

        $this->getLocation($fields);

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
