<?php 
namespace App\helper;

class ApiFormater{
    protected $Response=[
        "meta"=>[
            "status"=>null,
            "code"=>null,
            "message"=>null
        ],
       "data" => null
    ];


    static public function Success($message='success 200!',$status=200,$code=200,$data=null)
    {
       self::$Response['meta']['status']=$status;
       self::$Response['meta']['code']=$code;
       self::$Response['meta']['message']=$message;
       self::$Response['data']=$data;
       return response()->json(self::$Response,self::$Response['meta']['status']);
    }

    static public function Error($message='server internal error',$status='error 500',$code=500,$data=null)
    {
       self::$Response['meta']['status']=$status;
       self::$Response['meta']['code']=$code;
       self::$Response['meta']['message']=$message;
       self::$Response['data']=$data;
       return response()->json(self::$Response,self::$Response['meta']['status']);
    }

}
?>