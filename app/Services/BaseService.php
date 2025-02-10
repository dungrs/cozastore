<?php 

namespace App\Services;
use App\Services\Interfaces\BaseServiceInterface;

use Illuminate\Support\Facades\DB;

class BaseService implements BaseServiceInterface {
    public function __construct() {

    }

    public function updateStatus($model = [], $id) {
        DB::beginTransaction();

        try {
            $payload = [
                $model['field'] => $model['status']
            ];
            $model = $this->{lcfirst($model['model']) . 'Repository'}->update($id, $payload);
            if ($model) {
                DB::commit();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Cập nhật trạng thái thành công!',
                ], 200);
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => "Cập nhật trạng thái không thành công! Hãy thử lại!"
            ], 500);
        }
    }

    public function updateStatusAll($model= []) {
        DB::beginTransaction();

        try {
            $condition = [
                ['id', 'IN', $model['ids']],
            ];
            $payload = [
                $model['field'] => $model['status']
            ];

        
            $models = $this->{lcfirst($model['model']) . 'Repository'}->updateByWhere($condition, $payload);
            if ($models) {
                DB::commit();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Cập nhật trạng thái thành công!',
                ], 200);
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => "Cập nhật trạng thái không thành công! Hãy thử lại!"
            ], 500);
        }
    }
}