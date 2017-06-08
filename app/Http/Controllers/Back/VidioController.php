<?php

namespace App\Http\Controllers\Back;

use App\Events\ForgetCacheEvent;
use App\Service\CategoryService;
use App\Service\VidioService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VidioController extends Controller
{
    public function __construct(VidioService $service)
    {
        $this->middleware('auth.back:back');
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.vidio.index');
    }

    /**
     * @return mixed
     */
    public function indexData(){
        return $this->service->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryService $categoryService)
    {
        $category = $categoryService->cacheService->allCacheByOption(
            $categoryService->categoryRepository->makeModel()
        );
        return view('back.vidio.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->service->store($request);
        return redirect('back/vidio');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, CategoryService $categoryService)
    {
        $category = $categoryService->cacheService->allCacheByOption(
            $categoryService->categoryRepository->makeModel()
        );
        $vidio = $this->service->repository->find($id);
        return view('back.vidio.edit', compact('category', 'vidio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->service->update($request, $id);
        return redirect('back/vidio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->repository->delete($id);
        event(new ForgetCacheEvent($this->service->repository->makeModel()));
        return redirect()->back();
    }
}