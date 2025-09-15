<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\InstitutionsService;
use App\Http\Requests\Institutions\InstitutionsRegisterRequest;

class InstitutionsController extends Controller
{
    public function create(InstitutionsRegisterRequest $institutionsRegisterRequest, InstitutionsService $institutionsService)
    {
        try {
            $institutionId = $institutionsService->register($institutionsRegisterRequest);
            $return = [
                'institution_id' => $institutionId,
                'message' => 'Intitution created successfully!'
            ];

            return $this->getResponseJson($return);
        } catch (\Exception $e) {
            return $this->getResponseJson(['message' => $e->getMessage()], 400);
        }
    }
}
