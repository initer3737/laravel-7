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


    static public function Success($message,$status=null,$code=null,$data=null)
    {
        # code...
    }

}
?>