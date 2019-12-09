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
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    // Activa el middleware en todo el controlador
    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'getGroupsByCountry',
            'getGroupsByType', 'getGroupsByCategory', 'getGroupsByTag');
    }
    //

    /**
     * @return GroupResourceCollection
     */

    public function index(): GroupResourceCollection
    {
        return new GroupResourceCollection(Group::paginate());

//        $groups = Group::whereCountryId(1)->get();
//        return new GroupResourceCollection($groups);
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

        $group = auth()->user()->groups()->create([
            'name' => $request['name'],
            'description' => $request['description'],
            'type' => $request['type'],
            'category_id' => $request['category_id'],
            'country_id' => $request['country_id']
            ]);
//        $group = Group::create($request->all());
//        $group = DB::table('groups')->where('name',$request['name']);

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

    public function destroy(Group $group, $id)
    {

//        auth()->user()->group


        $group->delete();

        return response()->json();

    }

    public function getGroupsByCountry($id) : GroupResourceCollection
    {

        $groups = Group::whereCountryId($id)->get();
        return new GroupResourceCollection($groups);

    }
    public function getGroupsByType($id) : GroupResourceCollection
    {

        $groups = Group::whereTypeId($id)->get();
        return new GroupResourceCollection($groups);

    }
    public function getGroupsByTag($id) : GroupResourceCollection
    {

        $groups = Group::whereTagId($id)->get();
        return new GroupResourceCollection($groups);

    }

}
