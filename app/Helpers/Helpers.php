<?php

use Illuminate\Support\Facades\Auth;
function permission($permissionName){
    return Auth::guard('admin')->user()->hasAnyPermission($permissionName)? true : false;
}
?>