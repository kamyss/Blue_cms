<?php

namespace App\Http\Controllers\Web;

use App\Entities\Article;
use App\Service\ArticleService;
use App\Service\Cache\CacheServiceInterface;
use App\Service\CategoryService;
use App\Service\Theme\ThemeService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class WebController extends Controller
{
    public function __construct(CategoryService $categoryService, ThemeService $themeService,CacheServiceInterface $cacheService)
    {
        $this->themeService = $themeService;
        $this->categoryService = $categoryService;
        $this->cacheService = $cacheService;
    }

    public function makeIndex(){

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function makeList($id){
        //分类
        $category = $this->themeService->getTheme($this->categoryService->categoryRepository->makeMOdel(), 'categoryModule', $id);
        //模块对应的数据库模型
        $page = Input::get('page');
        if (empty($page)) $page = 1;
        $lists = $this->themeService->getList($id, 16, $page);

        return view('web.'.$category->categoryModule->list,compact('lists','category'));
    }

    /**
     * @param $cate_id
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function makeContent($cate_id, $id){
        //分类
        $category = $this->themeService->getTheme($this->categoryService->categoryRepository->makeMOdel(), 'categoryModule', $cate_id);
        //文档内容
        $content = $this->themeService->getContent($cate_id, $id);

       // dd($content);
        foreach ($content as $value){
            $content = $value;
        }
        //dd($content);
        return view('web.'.$category->categoryModule->article, compact('content', 'category'));
    }

    public function makeTags(){
        return $this->themeService->getAllTag();
    }

    public function filterTag(){

    }

    public function makeSearch(){

    }


}