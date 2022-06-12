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


    static public function Success($message=null,$status=null,$code=null,$data=null)
    {
       self::$Response['meta']['status']=$status;
       self::$Response['meta']['code']=$code;
       self::$Response['meta']['message']=$message;
       self::$Response['data']=$data;
       return response()->json(self::$Response,self::$Response['meta']['status'])
    }

}
?>