<?php

namespace App\Services;

use App\Repositories\UserLogRepository;

class UserLogService
{
    private $userLogRepository;

    public function __construct(UserLogRepository $userLogRepository) {
        $this->userLogRepository = $userLogRepository;
    }

    public function index() {
        return $this->userLogRepository->index();
    }

    public function show($id) {
        return $this->userLogRepository->show($id);
    }

    public function store($request) {
        return $this->userLogRepository->store($request);
    }

    public function update($id, $request) {
        return $this->userLogRepository->update($id, $request);
    }

    public function destroy($id) {
        return $this->userLogRepository->destroy($id);
    }

    public function rules() {
        return $this->userLogRepository->rules();
    }
}
