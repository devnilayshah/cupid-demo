<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\User;
use App\UserDetail;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     //register form
    public function index(){
       
       $familyTypes = config('constant.FAMILY_TYPE');
       $occupations = config('constant.OCCUPATION');
        return view('register.index',[
            'familyTypes'=>$familyTypes,
            'occupations'=>$occupations,            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{


            $validate = $this->validate($request,[
                 'first_name'=>'required',
                 'last_name'=>'required',
                 'email_id'=>'required',
                 'password'=>'required',
                 'annual_income'=>'required',
                 'date_of_birth'=>'required',
                 'gender'=>'required',
            ]);

            $uData = [
                'name'=>$request->get('first_name').' '.$request->get('last_name'),
                'email'=>$request->get('email_id'),
                'password'=>$request->get('password')
            ];

            $user = User::create($uData);

            if($request->has('occupation_preference') && !empty($request->get('occupation_preference'))){
                $occupationPreference = implode(',',$request->get('occupation_preference'));
            }

             if($request->has('family_type_preference') && !empty($request->get('family_type_preference'))){
                $familyTypePreference = implode(',',$request->get('family_type_preference'));
            }

            $uDetails =[
                'user_id'=>$user->id,
                'first_name'=>$request->get('first_name'),
                'last_name'=>$request->get('last_name'),
                'annual_income'=>$request->get('annual_income'),
                'date_of_birth'=>$request->get('date_of_birth'),
                'gender'=>$request->get('gender'),
                'occupation'=>$request->get('occupation'),
                'family_type'=>$request->get('family_type'),
                'manglik'=>$request->get('manglik'),
                'occupation_preference'=>$occupationPreference,
                'family_type_preference'=>$familyTypePreference,
                'manglik_preference'=>$request->get('manglik_preference') ?? null,
                'annual_income_preference_from'=>$request->get('annual_income_preference_from') ?? null,
                'annual_income_preference_to'=>$request->get('annual_income_preference_to') ?? null,
            ];

            $userDetail = UserDetail::create($uDetails);

            DB::commit();

            return redirect()->route('login')->with('success_msg',trans('messages.register.success'));

        }catch(QueryException $e){
            Log::error('Registration -'.$e);
            DB::rollBack();
            return redirect()->route('login')->with('error_msg',trans('messages.register.error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->ajax()){
            $emailId = $request->get('email_id');
            $user = User::where('email',$emailId)->first();
            if(!is_null($user)){
                return "false";
            }else{
                return "true";
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
