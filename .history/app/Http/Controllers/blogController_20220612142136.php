<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\formater\ApiFormater;
use App\blog;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            "meta"=>[
                "status"=>"succes",
                "message"=>"ok!",
                "code"=>"200"
            ],
            "data"=>blog::all()
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json([
            "meta"=>[
                "status"=>"succes",
                "message"=>"ok!",
                "code"=>"200"
            ],
            "data"=>blog::find($id)
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data=blog::find($id);
        $updated=
        return response()->json([
            "meta"=>[
                "status"=>"succes",
                "message"=>"update successfully!",
                "code"=>"200"
            ],
            "data"=>$updated
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json([
            "meta"=>[
                "status"=>"succes",
                "message"=>"delete successfully!!",
                "code"=>"200"
            ],
            "data"=>blog::find($id)->delete()
        ],200);
    }
}
