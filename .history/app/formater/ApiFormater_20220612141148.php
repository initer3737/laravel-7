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
       self::$respon['meta']['status']=$status;
       self::$respon['meta']['code']=$code;
       self::$respon['meta']['message']=$message;
       self::$respon['data']=$data;
       return response()->json(self::$respon,$status);
    }

    static  function Error($message=null,$status=null,$code=null,$data=null)
    {
       self::$respon['meta']['status']=$status;
       self::$respon['meta']['code']=$code;
       self::$respon['meta']['message']=$message;
       self::$respon['data']=$data;
       return response()->json(self::$respon,self::$respon['meta']['status']);
    }

}
?>