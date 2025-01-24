<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct() {

    }

    public function index() {
        $template = 'backend.dashboard.home.index';
        $config = $this->config();
        return view('backend.dashboard.layout', compact(
            'template',
            'config'
        ));
    }

    public function config() {
        return [
            'js' => [
                'backend/js/pages/dashboard.js'
            ]
        ];
    }
}
