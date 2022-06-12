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
       self::$Response['meta']['status'];
       self::$Response['meta']['status'];
       self::$Response['meta']['status'];
    }

}
?>