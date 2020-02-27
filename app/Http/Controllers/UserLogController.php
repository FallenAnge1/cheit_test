<?php

namespace App\Http\Controllers;

use App\Services\UserLogService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class UserLogController
{
    private $userLogService;

    public function __construct(UserLogService $userLogService) {
        $this->userLogService = $userLogService;
    }

    public function index(Request $request) {
        $logs = $this->userLogService->index();

        return response()->json(['data' => $logs], Response::HTTP_OK);
    }

    public function show($id, Request $request) {
        $rules = array_only($this->userLogService->rules(), ['id']);

        $validator = Validator::make(['id' => $id], $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->toArray()], Response::HTTP_BAD_REQUEST);
        }

        $log = $this->userLogService->show($id);

        if (empty($log)) {
            return response()->json(['errors' => ['UserLog' => 'not found']], Response::HTTP_NOT_FOUND);
        }

        return response()->json(['data' => $log], Response::HTTP_OK);
    }

    public function store(Request $request) {
        $rules = array_except($this->userLogService->rules(), ['id']);

        $fields = array_only($request->all(), array_keys($rules));

        $validator = Validator::make($fields, $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->toArray()], Response::HTTP_BAD_REQUEST);
        }

        $log = $this->userLogService->store($fields);

        return response()->json(['data' => $log], Response::HTTP_OK);
    }

    public function create() {
        return view('userLogForm');
    }

    public function update($id, Request $request) {
        $rules = $this->userLogService->rules();

        $fields = array_only($request->all(), array_keys($rules));

        $validator = Validator::make(array_merge($fields, ['id' => $id]), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->toArray()], Response::HTTP_BAD_REQUEST);
        }

        $log = $this->userLogService->update($id, $fields);

        if (empty($log)) {
            return response()->json(['errors' => ['UserLog' => 'not found']], Response::HTTP_NOT_FOUND);
        }

        return response()->json(['data' => $log], Response::HTTP_OK);
    }

    public function destroy($id, Request $request) {
        $rules = array_only($this->userLogService->rules(), ['id']);

        $validator = Validator::make(['id' => $id], $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->toArray()], Response::HTTP_BAD_REQUEST);
        }

        $log = $this->userLogService->destroy($id);

        if (empty($log)) {
            return response()->json(['errors' => ['UserLog' => 'not found']], Response::HTTP_NOT_FOUND);
        }

        return response()->json(null, Response::HTTP_OK);
    }
}
