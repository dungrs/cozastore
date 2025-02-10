<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;

use App\Services\LanguageService;

use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;

use Illuminate\Http\Request;

class LanguageController extends Controller
{   
    protected $languageService; 

    public function __construct(LanguageService $languageService) {
        $this->languageService = $languageService;
    }
    
    public function filter(Request $request) {
        $languages = $this->languageService->paginate($request);
        if ($languages) {
            return response()->json([
                'status' => 'success',
                'data' => $languages,
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => "Lấy dữ liệu không thành công!"
            ], 500);
        }
    } 

    public function create(StoreLanguageRequest $request) {
        $response = $this->languageService->create($request);
        return $response;
    }

    public function edit($id) {
        $language = $this->languageService->getLanguageDetails($id);
        return $language;
    }

    public function update(UpdateLanguageRequest $request, $id) {
        $response = $this->languageService->update($request, $id);
        return $response;
    }

    public function delete($id) {
        $response = $this->languageService->delete($id);
        return $response;
    }
}
