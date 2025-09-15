<?php

namespace App\Services;

use App\Models\Institution;
use App\Services\BaseService;
use App\Models\InstitutionModel;
use App\Http\Requests\Institutions\InstitutionsRegisterRequest;

class InstitutionsService extends BaseService
{
    /**
     * Method for institution creation
     *
     * @param InstitutionsRegisterRequest $data
     * @return int
     */
    public function register(InstitutionsRegisterRequest $institutionsRegisterRequest)
    {
        $data = $institutionsRegisterRequest['data'];
        $institution = Institution::create([
            'name' => $data['name'],
            'document' => $data['document'],
            'document_type' => $data['document_type'],
            'address' => $data['address'],
            'complement' => $data['complement'],
            'zip_code' => $data['zip_code'],
        ]);

        return $institution->id;
    }
}