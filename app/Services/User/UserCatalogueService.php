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
        $condition = [
            'keyword' => addslashes($request->input('keyword')),
            'publish' => $request->integer('publish'),
        ];
        $extend['path'] = '/user/catalogue/index';
        $extend['fieldSearch'] = ['name', 'phone', 'description', 'email'];
        $userCatalogues = $this->userCatalogueRepository->paginate(
            $this->paginateSelect(),
            $condition,
            $perpage,
            $page,
            $extend,
            ['id', 'DESC'],
            [],
            ['users']
        );
        return $userCatalogues;
    }

    public function create($request) {
        DB::beginTransaction();

        try {
            $payload = $request->except('_token');
            $userCatalogues = $this->userCatalogueRepository->create($payload);
            if ($userCatalogues) {
                DB::commit();
                return response()->json([
                    'status' => 'success',
                    'message' => ('messages.notifications.create_success'),
                    'data' => $userCatalogues,
                ], 200);
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => __('messages.notifications.create_error')
            ], 500);
        }
    }

    public function update($request, $id) {
        DB::beginTransaction();

        try {
            $payload = $request->except('_token');
            $userCatalogues = $this->userCatalogueRepository->update($id, $payload);
            if ($userCatalogues) {
                DB::commit();
                return response()->json([
                    'status' => 'success',
                    'message' => __('messages.notifications.update_success'),
                    'data' => $userCatalogues,
                ], 200);
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => __('messages.notifications.update_error')
            ], 500);
        }
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

    public function getUserCatalogueDetails($id) {
        $userCatalogue = $this->userCatalogueRepository->findById($id);
        if ($userCatalogue) {
            return response()->json([
                'status' => 'success',
                'data' => $userCatalogue,
            ], 200);
        }
    }

    private function paginateSelect() {
        return [
            'id',
            'name',
            'description',
            'email',
            'phone',
            'publish',
        ];
    }
}