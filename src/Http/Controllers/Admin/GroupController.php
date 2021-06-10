<?php

namespace Adminetic\Contact\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Adminetic\Contact\Models\Admin\Group;
use Adminetic\Contact\Http\Requests\GroupRequest;
use Adminetic\Contact\Contracts\GroupRepositoryInterface;


class GroupController extends Controller
{
    protected $groupRepositoryInterface;

    public function __construct(GroupRepositoryInterface $groupRepositoryInterface)
    {
        $this->groupRepositoryInterface = $groupRepositoryInterface;
        $this->authorizeResource(Group::class, 'group');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact::admin.group.index', $this->groupRepositoryInterface->indexGroup());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact::admin.group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Adminetic\Contact\Http\Requests\GroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
        $this->groupRepositoryInterface->storeGroup($request);
        return redirect(adminRedirectRoute('group'))->withSuccess('Group Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Adminetic\Contact\Models\Admin\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return view('contact::admin.group.show', $this->groupRepositoryInterface->showGroup($group));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Adminetic\Contact\Models\Admin\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('contact::admin.group.edit', $this->groupRepositoryInterface->editGroup($group));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Adminetic\Contact\Http\Requests\GroupRequest  $request
     * @param  \Adminetic\Contact\Models\Admin\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(GroupRequest $request, Group $group)
    {
        $this->groupRepositoryInterface->updateGroup($request, $group);
        return redirect(adminRedirectRoute('group'))->withInfo('Group Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Adminetic\Contact\Models\Admin\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $this->groupRepositoryInterface->destroyGroup($group);
        return redirect(adminRedirectRoute('group'))->withFail('Group Deleted Successfully.');
    }
}
