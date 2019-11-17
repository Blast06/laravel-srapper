<?php

namespace App\Http\Controllers\Api;

use App\Group;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateGroupRequest;
use App\Http\Resources\GroupResource;
use App\Http\Resources\GroupResourceCollection;
use App\User;
use const Grpc\STATUS_OK;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    //

    /**
     * @return GroupResourceCollection
     */

    public function index(): GroupResourceCollection
    {
        return new GroupResourceCollection(Group::paginate());

    }

    /**
     * @param Group $group
     * @return GroupResource
     */
    public function show( Group $group) : GroupResource
    {

        return new GroupResource($group);
    }

    /**
     * @param CreateGroupRequest $request
     * @return GroupResource
     */
    public function store(CreateGroupRequest $request)
    {
        // create the group
        $group = Group::create($request->all());

        return new GroupResource($group);
    }

    public function update(Group $group, CreateGroupRequest $request, User $user): GroupResource
    {

        //TODO
        // verify if the group belongs to the editor
        $this->authorize('update', $user->group);
        $group->update($request->all());
        return new GroupResource($group);

    }

    public function destroy(Group $group)
    {

//        auth()->user()->group
        $group->delete();

        return response()->json();

    }

}
