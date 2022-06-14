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
            $file=$request->file('file');
            $filename=time().$file->getClientOriginalName();
            $file->move('gambar/',$filename);

             blog::create([
                'name'=>$request->name,
                'address'=>$request->address,
                'file'=>$filename,
                'age'=>$request->age,
                'telp'=>$request->telp,
                'hobby'=>$request->hobby,
                'job'=>$request->job
             ]);
            return response()->json('created successfully!'
            ,200);
        } catch (\Throwable $th) {
            return response()->json([
                "meta"=>[
                    "status"=>"error",
                    "message"=>"internal server error!",
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
    public function show($id)
    {
        try {
            $data=blog::find($id);
            if(is_null($data)){
                return response()->json([
                    "meta"=>[
                        "status"=>"404 not found!",
                        "message"=>"data not found!",
                        "code"=>"404"
                    ],
                    "data"=>null
                ],400);
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
        } catch (\Throwable $th) {
            return response()->json([
                "meta"=>[
                    "status"=>"error",
                    "message"=>"internal server error!",
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
    public function update(Request $request, $id)
    {
        try {
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
            // if(){
            //     unlink('gambar/'.$data->file);
            // }
            $file=$request->file('file');
            $filename=time().$file->getClientOriginalName();
            // $file->move('gambar/',$filename);
            //update data
                $data->name=$request->name;
                $data->address=$request->address;
                $data->file=$filename;
                $data->age=$request->age;
                $data->telp=$request->telp;
                $data->hobby=$request->hobby;
                $data->job=$request->job;
                $data->save();
            return response()->json([
                "meta"=>[
                    "status"=>"succes",
                    "message"=>"update successfully!",
                    "code"=>"200"
                ],
                "data"=>$data
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                "meta"=>[
                    "status"=>"error",
                    "message"=>"internal server error!",
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
            if(is_null($data)){
                return response()->json([
                    "meta"=>[
                        "status"=>"not found",
                        "message"=>"data not found!!",
                        "code"=>"404"
                    ]
                ],404);
            }
            $data->delete();
            if(Exists('gambar/'..$data->file)){
                unlink('gambar/'.$data->file);
            }
        return response()->json([
            "meta"=>[
                "status"=>"succes",
                "message"=>"delete successfully!!",
                "code"=>"200"
            ]
        ],200);
        } catch (\e $th) {
            return response()->json([
                "meta"=>[
                    "status"=>"error",
                    "message"=>"internal server error!",
                    "code"=>"500"
                ],
            ],500);
        }
    }

}
