<?php 
namespace App\formater;

class ApiFormater{
    protected static $response=[
        "meta"=>[
            "code"=>"",
            "message"=>null,
            "status"=>null
        ],
        "data"=>null
    ];


    static  function Success($message=null,$status=null,$code=null,$data=null)
    {
       self::$Response['meta']['status']=$status;
       self::$Response['meta']['code']=$code;
       self::$Response['meta']['message']=$message;
       self::$Response['data']=$data;
       return response()->json(self::$Response,$status);
    }

    static  function Error($message=null,$status=null,$code=null,$data=null)
    {
       self::$Response['meta']['status']=$status;
       self::$Response['meta']['code']=$code;
       self::$Response['meta']['message']=$message;
       self::$Response['data']=$data;
       return response()->json(self::$Response,self::$Response['meta']['status']);
    }

}
?>