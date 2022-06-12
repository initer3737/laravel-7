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
       self::$response['meta']['status']=$status;
       self::$response['meta']['code']=$code;
       self::$response['meta']['message']=$message;
       self::$response['data']=$data;
       return response()->json(self::$response,$status);
    }

    static  function Error($message=null,$status=null,$code=null,$data=null)
    {
       self::$response['meta']['status']=$status;
       self::$response['meta']['code']=$code;
       self::$response['meta']['message']=$message;
       self::$response['data']=$data;
       return response()->json(self::$response,self::$response['meta']['status']);
    }

}
?>