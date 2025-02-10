<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\User\UserService;

use App\Repositories\User\UserRepository;
use App\Repositories\User\UserCatalogueRepository;
use App\Repositories\Location\ProvinceRepository;

class UserController extends Controller
{   
    protected $userService;
    protected $userRepository;
    protected $userCatalogueRepository;
    protected $provinceRepository;

    public function __construct(
        UserService $userService, 
        UserRepository $userRepository, 
        UserCatalogueRepository $userCatalogueRepository, 
        ProvinceRepository $provinceRepository
    ) 
    {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
        $this->userCatalogueRepository = $userCatalogueRepository;
        $this->provinceRepository = $provinceRepository;
    }

    public function index(Request $request) {
        $template = 'backend.user.user.index';
        $currentLanguage = session('currentLanguage');
        $userCatalogues = $this->userCatalogueRepository->findByCondition(
            [
                ['ucl.language_id', '=', $currentLanguage->id],
            ],
            true,
            [
                [
                    'table' => 'user_catalogue_languages as ucl', 
                    'on' => [['ucl.user_catalogue_id', 'user_catalogues.id']]
                ]
            ],
            
            ['user_catalogues.id' => 'DESC'],
            [
                'user_catalogues.id', 
                'ucl.*', 
            ]
        );
        $configs = $this->configs();
        $configs['seo'] = __('messages.user');
        $provinces = $this->provinceRepository->all();
        return view('backend.dashboard.layout', compact(
            'template',
            'configs',
            'userCatalogues',
            'provinces'
        ));
    }

    public function configs() {
        return [
            'js' => [
                'backend/libs/flatpickr/flatpickr.min.js',
                'backend/libs/%40simonwep/pickr/pickr.min.js',
                'backend/libs/ckfinder/ckfinder.js',
                'backend/js/password_visiable.js',
                'backend/js/finder.js',
                'backend/js/location.js',
                'backend/js/library.js',
                'backend/js/pages/users.js',
            ],
            'css' => [
                'backend/libs/flatpickr/flatpickr.min.css'
            ],
            'model' => 'User',
            'modelParent' => 'User'
        ];
    }
}
