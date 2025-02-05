<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\User\UserCatalogueService;
use App\Repositories\User\UserCatalogueRepository;

class UserCatalogueController extends Controller
{   

    protected $userCatalogueService;
    protected $userCatalogueRepository;

    public function __construct(UserCatalogueService $userCatalogueService, UserCatalogueRepository $userCatalogueRepository) {
        $this->userCatalogueService = $userCatalogueService;
        $this->userCatalogueRepository = $userCatalogueRepository;
    }

    public function index(Request $request) {
        $template = 'backend.user.catalogue.index';
        $configs = $this->configs();
        $configs['seo'] = __('messages.user_catalogue');
        return view('backend.dashboard.layout', compact(
            'template',
            'configs'
        ));
    }

    public function configs() {
        return [
            'js' => [
                'backend/js/library.js',
                'backend/js/pages/user_catalogues.js'
            ],
            'model' => 'UserCatalogue',
            'modelParent' => 'User'
        ];
    }
}
