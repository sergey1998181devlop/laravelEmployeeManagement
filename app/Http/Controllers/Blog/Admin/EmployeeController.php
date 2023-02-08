<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\EmployerCreateRequest;
use App\Models\Employer;
use App\Repositories\PanelEmployeePositionRepository;
use App\Repositories\PanelEmployeeRepository;
use App\Repositories\PanelEmployeePermissionRepository;


class EmployeeController extends BaseController
{
    /**
     * @var PanelEmployeeRepository
     */
    private mixed $panelEmployeeRepository;
    /**
     * @var PanelEmployeePositionRepository
     */
    private $panelEmployeePositionRepository;
    /**
     * @var PanelEmployeePermissionRepository
     */
    private $panelEmployeePermissionRepository;

    public function __construct(){
        $this->panelEmployeeRepository = app(PanelEmployeeRepository::class);
        $this->panelEmployeePositionRepository = app(PanelEmployeePositionRepository::class);
        $this->panelEmployeePermissionRepository = app(PanelEmployeePermissionRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $paginator = $this->panelEmployeeRepository->getAllWithPaginate();
        return view('panel.admin.employers.index' , compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $item = new Employer();
        $positionList
            = $this->panelEmployeePositionRepository->getAllPositionList();
        $permissionList
            = $this->panelEmployeePermissionRepository->getAllPermissionList();
        return view('panel.admin.employers.edit' ,
            compact('item' , 'positionList'),
            compact('item' , 'permissionList')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EmployerCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployerCreateRequest $request)
    {
        $data = $request->input();
        $item = (new Employer())->create($data);

        if($item){
            return  redirect()->route('panel.admin.employers.edit' , [$item->id])
                ->with(['success' => 'Successfully saved , automatic redirection to the employee editing page']);
        }else{
            return back()->withErrors(['msg' => 'Saving error'])
                ->withInput();
        }
//
//        return view('blog.admin.posts.edit' , compact('item' , 'ca'))
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id )
    {
        $item = $this->panelEmployeeRepository->getEmploerEdit($id);
        if(empty($item)){
            abort(404);
        }
        $positionList
            = $this->panelEmployeePositionRepository->getAllPositionList();
        $permissionList
            = $this->panelEmployeePermissionRepository->getAllPermissionList();

        return view('panel.admin.employers.edit' ,
            compact('item' , 'positionList'),
            compact('item' , 'permissionList')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPostUpdateRequest $request, $id)
    {

    }
    public function destroy($id){
        $result = $this->panelEmployeeRepository->destroy($id);
        if($result){
            return redirect()
                ->route('panel.admin.employers.index')
                ->with(['success' => 'Successfully deleted ']);
        }else{
            return back()
                ->withErrors(['msg' => 'Delete error'])
                ->withInput();
        }
    }

}
