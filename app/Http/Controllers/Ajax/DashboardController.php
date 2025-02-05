<?php 

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class DashboardController extends Controller {

    public function __construct() {

    }

    public function changeStatus(Request $request, $id) {
        $post = $request->input();
        $serviceClass = resolveInstance($post['model'], $post['modelParent']);
        $response = $serviceClass->updateStatus($post, $id);
        return $response;
    }

    public function changeStatusAll(Request $request) {
        $post = $request->input();
        $serviceClass = resolveInstance($post['model'], $post['modelParent']);
        $response = $serviceClass->updateStatusAll($post);
        return $response;
    }
}
