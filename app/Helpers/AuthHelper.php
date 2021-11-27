<?php

use Illuminate\Support\Facades\Auth;

function sudahLogin()
{
    if(Auth::guard('user_provider')->check() || Auth::guard('supplier_provider')->check() || Auth::guard('shop_provider')->check()){
        return true;
    }else{
        return false;
    }
}

function getAuthUser()
{
    if(sudahLogin() == false){
        return false;
    }else{
        if(Auth::guard('user_provider')->check()){
            return Auth::guard('user_provider')->user();
        }else if("supplier_provider"){
            return Auth::guard('supplier_provider')->user();
        }else{
            return Auth::guard('shop_provider')->user();
        }
    }
}
