<?php

namespace App\Http\Controllers\Api;

use App\Group;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateGroupRequest;
use App\Http\Resources\GroupResource;
use App\Http\Resources\GroupResourceCollection;
use App\User;
use const Grpc\STATUS_OK;
use http\Env\Response;
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
    public function store(CreateGroupRequest $request) : GroupResource
    {
        // create the group
       $imageUrl = "https://groups-app.s3-us-west-1.amazonaws.com/";
       $imageUrl = $imageUrl .  \request()->file('image')->store(
            'groups',
            's3'
        );


        $group = auth()->user()->groups()->create([
            'name' => $request['name'],
            'description' => $request['description'],
            'image' => $imageUrl,
            'type_id' => $request['type_id'],
            'tag_id' => $request['tag_id'],
            'category_id' => $request['category_id'],
            'country_id' => $request['country_id']
            ]);


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

    public function destroy(Group $group, $id, User $user)
    {

        if ($this->authorize('update', $user->group)){
            $group->delete();
            return response()->json();
    }

    return response()->json(['status' => 401,
                             'message' => 'Cant delete group'
        ]);




    }

    public function getGroupsByCountry($id) : GroupResourceCollection
    {

        $groups = Group::whereCountryId($id)->get();
        return new GroupResourceCollection($groups);

    }

    public function getGroupsByCategory($id) : GroupResourceCollection
    {
        $groups = Group::whereCategoryId($id)->get();
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
