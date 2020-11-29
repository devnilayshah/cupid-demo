<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\UserDetail;

class DashboardController extends Controller
{
    //dashboard
    public function index(){

        $userDetail = UserDetail::where('user_id',Auth::user()->id)->first();

        $matches = UserDetail::where('gender','!=',$userDetail->gender);
        if(!is_null($userDetail->family_type_preference)){
            $familyTypes = explode(',',$userDetail->family_type_preference);
            $matches = $matches->whereIn('family_type',$familyTypes);
        }

        if(!is_null($userDetail->occupation_preference)){
            $occuptions = explode(',',$userDetail->occupation_preference);
            $matches = $matches->whereIn('occupation',$occuptions);
        }

        if(!is_null($userDetail->manglik_preference) && $userDetail->manglik_preference != 3){
            $matches = $matches->where('manglik',$userDetail->manglik_preference);
        }

        if(!is_null($userDetail->annual_income_preference_from) && !is_null($userDetail->annual_income_preference_to)){            
            $matches = $matches->whereBetween('annual_income',[$userDetail->annual_income_preference_from,$userDetail->annual_income_preference_to]);
        }

        $matches = $matches->get();

        return view('dashboard.index',['matches'=>$matches]);
    }
}
