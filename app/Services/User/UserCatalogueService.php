<?php 

namespace App\Services\User;
use App\Services\Interfaces\User\UserCatalogueServiceInterface;
use App\Services\BaseService;

use App\Repositories\User\UserCatalogueRepository;

use Illuminate\Support\Facades\DB;

class UserCatalogueService extends BaseService implements UserCatalogueServiceInterface {

    protected $userCatalogueRepository;

    public function __construct(UserCatalogueRepository $userCatalogueRepository) {
        $this->userCatalogueRepository = $userCatalogueRepository;
    }

    public function paginate($request) {
        $perpage = $request->input('perpage') ?? 2;
        $page = $request->integer('page');
        $languageId = $request->integer('language_id') ?? session('currentLanguage')->id;
        $condition = [
            'keyword' => addslashes($request->input('keyword')),
            'publish' => $request->integer('publish'),
            'where' => [
                ['ucl.language_id', '=',  $languageId]
            ]
        ];
        $extend['path'] = '/user/catalogue/index';
        $extend['fieldSearch'] = ['name', 'phone', 'description', 'email'];
        $join = [
            [
                'table' => 'user_catalogue_languages as ucl', 
                'on' => [['ucl.user_catalogue_id', 'user_catalogues.id']]
            ]
        ];
        $userCatalogues = $this->userCatalogueRepository->paginate(
            $this->paginateSelect(),
            $condition,
            $perpage,
            $page,
            $extend,
            ['id', 'DESC'],
            $join,
            ['users']
        );

        return $userCatalogues;
    }

    public function create($request) {
        DB::beginTransaction();

        try {
            $userCatalogue = $this->createUserCatalogue($request);
            $languageId = $request->input('language_id');
            if ($userCatalogue) {
                $this->updateUserCatalogueLanguage($request, $userCatalogue, $languageId);
                DB::commit();
                return response()->json([
                    'status' => 'success',
                    'message' => __('messages.notifications.create_success'),
                    'data' => $userCatalogue,
                ], 200);
            }

        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return response()->json([
                'status' => 'error',
                'message' => __('messages.notifications.create_error')
            ], 500);
        }
    }

    public function update($request, $id, $languageId) {
        DB::beginTransaction();

        try {
            $flag = $this->updateUserCatalogue($request, $id);
            if ($flag) {
                $userCatalogue = $this->userCatalogueRepository->findById($id);
                $this->updateUserCatalogueLanguage($request, $userCatalogue, $languageId);
                DB::commit();
                return response()->json([
                    'status' => 'success',
                    'message' => __('messages.notifications.update_success'),
                    'data' => $userCatalogue,
                ], 200);
            }

        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return response()->json([
                'status' => 'error',
                'message' => __('messages.notifications.update_error')
            ], 500);
        }
    }

    private function createUserCatalogue($request) {
        $payload = $request->only($this->payload());
        return $this->userCatalogueRepository->create($payload);
    }

    private function updateUserCatalogue($request, $id) {
        $payload = $request->only($this->payload());
        return $this->userCatalogueRepository->update($id, $payload);
    }
    
    
    private function updateUserCatalogueLanguage($request, $userCatalogue, $languageId) {
        $payload = $request->only($this->payloadLanguage());
        $payload['user_catalogue_id'] = $userCatalogue->id;
        $payload['language_id'] = $languageId;
        $userCatalogue->languages()->detach($languageId, $userCatalogue->id);
        return $this->userCatalogueRepository->createPivot($userCatalogue, $payload, 'languages');
    }

    private function payloadLanguage() {
        return ['name', 'description'];
    }

    private function payload() {
        return ['phone', 'email'];
    }

    public function delete($id) {
        DB::beginTransaction();
    
        try {
            $userCatalogue = $this->userCatalogueRepository->findById($id);
            if ($userCatalogue && $userCatalogue->users()->count() > 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => __('messages.notifications.delete_error_users_exist')
                ], 400);
            }
    
            $userCatalogues = $this->userCatalogueRepository->delete($id);
            if ($userCatalogues) {
                DB::commit();
                return response()->json([
                    'status' => 'success',
                    'message' => __('messages.notifications.delete_success'),
                ], 200);
            }
    
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => __('messages.notifications.delete_error')
            ], 500);
        }
    }

    public function getUserCatalogueDetails($id, $languageId) {
        $userCatalogue = $this->userCatalogueRepository->findByCondition(
            [
                ['ucl.language_id', '=', $languageId],
                ['user_catalogues.id', '=', $id],
            ],
            false,
            [
                [
                    'table' => 'user_catalogue_languages as ucl', 
                    'on' => [['ucl.user_catalogue_id', 'user_catalogues.id']]
                ]
            ],
            ['user_catalogues.id' => 'DESC'],
            [
                'user_catalogues.id',
                'user_catalogues.phone',
                'user_catalogues.email',
                'ucl.*', 
            ]
        );
        if ($userCatalogue) {
            return response()->json([
                'status' => 'success',
                'data' => $userCatalogue,
            ], 200);
        }
    }

    public function getDetails($id) {
        $userCatalogue = $this->userCatalogueRepository->findByCondition(
            [
                ['user_catalogues.id', '=', $id],
            ],
            true,
            [
                [
                    'table' => 'user_catalogue_languages as ucl', 
                    'on' => [['ucl.user_catalogue_id', 'user_catalogues.id']]
                ],
                [
                    'table' => 'languages as l', 
                    'on' => [['l.id', 'ucl.language_id']]
                ]
            ],
            ['user_catalogues.id' => 'DESC'],
            [
                'user_catalogues.id',
                'user_catalogues.phone',
                'user_catalogues.email',
                'ucl.*', 
                'l.canonical', 
            ]
        );
        if ($userCatalogue) {
            return response()->json([
                'status' => 'success',
                'data' => $userCatalogue,
            ], 200);
        }
    }

    public function saveTranslate($request, $id) {
        try {
            $payload['name'] = $request->input('name_trans');
            $payload['description'] = $request->input('description_trans');
            $payload['language_id'] = $request->input('language_id');
            $payload['user_catalogue_id'] = $id;
            $userCatalogue = $this->userCatalogueRepository->findById($id);
            $userCatalogue->languages()->detach([$payload['language_id'], $id]);
            $this->userCatalogueRepository->createPivot($userCatalogue, $payload, 'languages');
    
            return response()->json([
                'status' => 'success',
                'message' => __('messages.notifications.translation_saved_successfully'),
                'data' => $userCatalogue,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => __('messages.notifications.error_saving_translation'),
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    private function paginateSelect() {
        return [
            'id',
            'ucl.name',
            'ucl.description',
            'email',
            'phone',
            'publish',
        ];
    }
}