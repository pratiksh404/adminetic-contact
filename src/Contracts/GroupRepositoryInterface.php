<?php

namespace Adminetic\Contact\Contracts;

use Adminetic\Contact\Models\Admin\Group;
use Adminetic\Contact\Http\Requests\GroupRequest;

interface GroupRepositoryInterface
{
    public function indexGroup();

    public function createGroup();

    public function storeGroup(GroupRequest $request);

    public function showGroup(Group $Group);

    public function editGroup(Group $Group);

    public function updateGroup(GroupRequest $request, Group $Group);

    public function destroyGroup(Group $Group);
}
