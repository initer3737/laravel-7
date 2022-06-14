<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\formater\ApiFormater;
use App\blog;
use App\Http\Requests\createRequest;
use Illuminate\Validation\Rules\Exists;
use file;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            //if the data is empty then
            if(is_null(blog::all())){
                //status code 204 are indicate that request from client 
                //are success but it return no contents or data is empty in database
                return response()->json([
                    "meta"=>[
                        "status"=>"data is empty!",
                        "message"=>"data in the database are empty!",
                        "code"=>"204"
                    ]
                ],204);
            }else{
                return response()->json([
                    "meta"=>[
                        "status"=>"succes",
                        "message"=>"ok!",
                        "code"=>"200"
                    ],
                    "data"=>blog::all()
                ],200);
            }
        } catch (\Throwable $e) {
            return response()->json([
                "meta"=>[
                    "status"=>"error",
                    "message"=>"{$e->getMessage()}",
                    "code"=>"500"
                ]
            ],500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *untuk menampilkan halaman form
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
    public function store(createRequest $request)
    {
        try {
            if($file=$request->file('file')){
                $filename=time().$file->getClientOriginalName();
                $path=$file->move('gambar',$filename);
                $uploadImg=$path;
            }
                $insert=$request->all();
                $insert['file']=$uploadImg;
                blog::create($insert);
            return response()->json('created successfully!'
            ,200);
        } catch (\Exception $e) {
            return response()->json([
                "meta"=>[
                    "status"=>"error",
                    "message"=>"{$e->getMessage()}",
                    "code"=>"500"
                ],
            ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //success
    public function show($id)
    {
        try {
            $data=blog::find($id);
            if(is_null($data)){
                return response()->json([
                    "meta"=>[
                        "status"=>"204",
                        "message"=>"no content!",
                        "code"=>"204"
                    ]
                ],204);
            }
            #when success!
            return response()->json([
                "meta"=>[
                    "status"=>"succes",
                    "message"=>"ok!",
                    "code"=>"200"
                ],
                "data"=>$data
            ],200);
        } catch (\Exception $e) {
            return response()->json([
                "meta"=>[
                    "status"=>"error",
                    "message"=>"{$e->getMessage()}",
                    "code"=>"500"
                ],
            ],500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *untuk menampilkan halaman edit
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
    public function update(createRequest $request, $id)
    {
        try {
            $req=$request->all();
            $data=blog::find($id);
            if(is_null($data)){
                return response()->json([
                    "meta"=>[
                        "status"=>"not found",
                        "message"=>"data not found!!",
                        "code"=>"404"
                    ]
                ],404);
            }
                //jika ketemu maka update
            if($file=$req['file']){
                $filename=time().$file->getClientOriginalName();
                $path=$file->move('gambar/',$filename);
                $req['file']=$path;
            }
            
            //update data
            $data->update($req);
            return response()->json([
                "meta"=>[
                    "status"=>"succes",
                    "message"=>"update successfully!",
                    "code"=>"200"
                ],
                "data"=>$data
            ],200);
        }  catch (\Exception $e) {
            return response()->json([
                "meta"=>[
                    "status"=>"error",
                    "message"=>"{$e->getMessage()}",
                    "code"=>"500"
                ],
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data=blog::find($id);
            //if the data is empty
            if(is_null($data)){
                return response()->json([
                    "meta"=>[
                        "status"=>"not found",
                        "message"=>"data not found!!",
                        "code"=>"404"
                    ]
                ],404);
            }
            
            //if the file is exist then delete it
            //coment code bellow !
            /**
             * if the data found?
             * the code bellow
             * is if the data file in db exist then delete the file
             */
            if($data->file){
                unlink('gambar/'.$data->file);
            }
            $data->delete();
        return response()->json([
            "meta"=>[
                "status"=>"succes",
                "message"=>"delete successfully!!",
                "code"=>"200"
            ]
        ],200);
        }  catch (\Exception $e) {
            return response()->json([
                "meta"=>[
                    "status"=>"error",
                    "message"=>"{$e->getMessage()}",
                    "code"=>"500"
                ],
            ],500);
    

}
}

}