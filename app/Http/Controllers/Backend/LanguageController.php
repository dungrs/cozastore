<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\LanguageService;

use App\Repositories\LanguageRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{   
    protected $languageService;
    protected $languageRepository;
    protected $userRepository;

    public function __construct(
        LanguageService $languageService, 
        LanguageRepository $languageRepository, 
        UserRepository $userRepository, 
    ) 
    {
        $this->languageService = $languageService;
        $this->languageRepository = $languageRepository;
        $this->userRepository = $userRepository;
    }

    public function index(Request $request) {
        $template = 'backend.language.index';
        $languages = $this->languageRepository->all();
        $configs = $this->configs();
        $configs['seo'] = __('messages.language');
        return view('backend.dashboard.layout', compact(
            'template',
            'configs',
            'languages',
        ));
    }

    public function switchBackendLanguage($id) {
        $language = $this->languageRepository->findById($id);
        $user = $this->userRepository->findById(Auth::id());
        $user->languageable()->associate($language);
        $user->save();
        $locale = session('backend_locale');
        if (!$locale) {
            $locale = $user->language ? $user->language->canonical : 'vn';
            session(['backend_locale' => $locale]);
        }

        App::setLocale('vn'); 
        return back();
    }

    public function configs() {
        return [
            'js' => [
                'backend/libs/flatpickr/flatpickr.min.js',
                'backend/libs/%40simonwep/pickr/pickr.min.js',
                'backend/libs/ckfinder/ckfinder.js',
                'backend/js/finder.js',
                'backend/js/library.js',
                'backend/js/pages/languages.js',
            ],
            'css' => [
                'backend/libs/flatpickr/flatpickr.min.css'
            ],
            'model' => 'Language',
            'modelParent' => ''
        ];
    }
}
