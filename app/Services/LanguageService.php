<?php 

namespace App\Services;
use App\Services\Interfaces\LanguageServiceInterface;
use App\Services\BaseService;

use App\Repositories\LanguageRepository;

use Illuminate\Support\Facades\DB;

class LanguageService extends BaseService implements LanguageServiceInterface {

    protected $languageRepository;

    public function __construct(LanguageRepository $languageRepository) {
        $this->languageRepository = $languageRepository;
    }

    public function paginate($request) {
        $perpage = $request->input('perpage') ?? 1;
        $page = $request->integer('page');
        $condition = [
            'keyword' => addslashes($request->input('keyword')),
        ];
        $extend['path'] = '/language/index';
        $extend['fieldSearch'] = ['name', 'description', 'canonical'];
        $languages = $this->languageRepository->paginate(
            $this->paginateSelect(),
            $condition,
            $perpage,
            $page,
            $extend,
            ['id', 'DESC'],
            [],
        );
        return $languages;
    }

    public function create($request) {
        DB::beginTransaction();

        try {
            $payload = $request->except('_token');
            $languages = $this->languageRepository->create($payload);
            if ($languages) {
                DB::commit();
                return response()->json([
                    'status' => 'success',
                    'message' => ('messages.notifications.create_success'),
                    'data' => $languages,
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
            $languages = $this->languageRepository->update($id, $payload);
            if ($languages) {
                DB::commit();
                return response()->json([
                    'status' => 'success',
                    'message' => __('messages.notifications.update_success'),
                    'data' => $languages,
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
            $language = $this->languageRepository->findById($id);
            if ($language && $language->users()->count() > 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => __('messages.notifications.delete_error_users_exist')
                ], 400);
            }
    
            $languages = $this->languageRepository->delete($id);
    
            if ($languages) {
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

    public function getLanguageDetails($id) {
        $language = $this->languageRepository->findById($id);
        if ($language) {
            return response()->json([
                'status' => 'success',
                'data' => $language,
            ], 200);
        }
    }

    private function paginateSelect() {
        return [
            'id',
            'name',
            'description',
            'image',
            'publish',
            'canonical',
        ];
    }
}