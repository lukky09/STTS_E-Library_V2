<?php

use Illuminate\Support\Facades\Auth;

function sudahLogin()
{
    if (Auth::guard('user_provider')->check() || Auth::guard('supplier_provider')->check()) {
        return true;
    } else {
        return false;
    }
}

function getAuthUser()
{
    if (sudahLogin() == false) {
        return false;
    } else {
        if (Auth::guard('user_provider')->check()) {
            return Auth::guard('user_provider')->user();
        } else {
            return Auth::guard('supplier_provider')->user();
        }
    }
}

function getAuthUserType()
{
    if (sudahLogin() == false) {
        return "none";
    } else {
        if (Auth::guard('supplier_provider')->check()) {
            return "supp";
        } else if (Auth::guard('user_provider')->user()->user_isadmin == 0) {
            return "user";
        } else {
            return "shop";
        }
    }
}

function AuthLogout()
{
    $type = getAuthUserType();
    if ($type == "supp") {
        Auth::guard('supplier_provider')->logout();
    } else if ($type == "user" || $type == "shop") {
        Auth::guard('user_provider')->logout();
    }
}
