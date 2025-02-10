<?php

namespace App\Http\Controllers\Ajax\User;

use App\Http\Controllers\Controller;

use App\Services\User\UserCatalogueService;

use App\Http\Requests\User\StoreUserCatalogueRequest;
use App\Http\Requests\User\UpdateUserCatalogueRequest;

use Illuminate\Http\Request;

class UserCatalogueController extends Controller
{   
    protected $userCatalogueService; 

    public function __construct(UserCatalogueService $userCatalogueService) {
        $this->userCatalogueService = $userCatalogueService;
    }

    public function filter(Request $request) {
        $userCatalogues = $this->userCatalogueService->paginate($request);
        if ($userCatalogues) {
            return response()->json([
                'status' => 'success',
                'data' => $userCatalogues,
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => "Lấy dữ liệu không thành công!"
            ], 500);
        }
    } 

    public function create(StoreUserCatalogueRequest $request) {
        $response = $this->userCatalogueService->create($request);
        return $response;
    }

    public function edit($id, $languageId) {
        $userCatalogue = $this->userCatalogueService->getUserCatalogueDetails($id, $languageId);
        return $userCatalogue;
    }

    public function translate(StoreUserCatalogueRequest $request, $id) {
        $userCatalogue = $this->userCatalogueService->saveTranslate($request, $id);
        return $userCatalogue;
    }

    public function details($id) {
        $userCatalogue = $this->userCatalogueService->getDetails($id);
        return $userCatalogue;
    }

    public function update(UpdateUserCatalogueRequest $request, $id, $languageId) {
        $response = $this->userCatalogueService->update($request, $id, $languageId);
        return $response;
    }

    public function delete($id) {
        $response = $this->userCatalogueService->delete($id);
        return $response;
    }
}
