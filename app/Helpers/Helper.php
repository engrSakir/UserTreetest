<?php

use App\Models\User;

if (!function_exists('random_code')) {

    function position($user_id){
        if(User::where('left_user', $user_id)->first()){
            return 'Left';
        }else if(User::where('right_user', $user_id)->first()){
            return 'Right';
        }else{
            return 'No Parent';
        }
    }


    function parent($user_id){
        if(User::where('left_user', $user_id)->first()){
            return User::where('left_user', $user_id)->first();
        }else if(User::where('right_user', $user_id)->first()){
            return User::where('right_user', $user_id)->first();
        }else{
            return 'No Parent';
        }
    }


    function user_tree($root_user_id){
        $data = [
            "l1"=>[
                "l1_u1" => null,
            ],

            "l2"=>[
                "l2_u1" => null,
                "l2_u2" => null,
            ],

            "l3"=>[
                "l3_u1" => null,
                "l3_u2" => null,
                "l3_u3" => null,
                "l3_u4" => null,
            ],
        ];

        foreach (App\Models\User::where('id', '>=', $root_user_id)->get()->take(7) as $key => $user){

            if ($key +1 == 1) {
                $data["l1"]["l1_u1"] = $user;
            }
            if ($key +1 == 2) {
                $data["l2"]["l2_u1"] = $user;
            }
            if ($key +1 == 3) {
                $data["l2"]["l2_u2"] = $user;
            }
            if ($key +1 == 4) {
                $data["l3"]["l3_u1"] = $user;
            }
            if ($key +1 == 5) {
                $data["l3"]["l3_u2"] = $user;
            }
            if ($key +1 == 6) {
                $data["l3"]["l3_u3"] = $user;
            }
            if ($key +1 == 7) {
                $data["l3"]["l3_u4"] = $user;
            }
        }

        return $data;
    }

}
