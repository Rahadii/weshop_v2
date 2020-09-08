<?php 

function check($permission, $role){
    $access = getPermission($role);
    foreach($permission as $key => $value){
        if($value == $access){
            return true;
        }
    }
}

function getPermission($id){
    switch ($id) {
        case 'admin':
            return "admin";
            break;
        
        case 'supplier':
            return "supplier";
            break;

        case 'member':
            return "member";
            break;
    }
}
?>