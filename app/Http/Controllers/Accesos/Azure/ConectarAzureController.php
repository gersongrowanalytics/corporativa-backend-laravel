<?php

namespace App\Http\Controllers\Accesos\Azure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use App\Models\uazusuariosazure;
use App\Models\usuusuarios;

class ConectarAzureController extends Controller
{
    public function LoginAccounts ()
    {

        return Socialite::driver('azure')->redirect();

    }



    public function RedirectAzure ()
    {

        $user = Socialite::driver('azure')->user();

        // dd($user->user['mail']);

        $uaz = uazusuariosazure::where('uazmail', $user->user['mail'])->first();

        $tokenlogin = Str::random(60);

        $usu = usuusuarios::where('usuusuario', $user->user['mail'])->first();

        if($uaz){

            if($usu){
                $uaz->usuid = $usu->usuid;
            }

            $uaz->uazidob               = $user->id;
            $uaz->uaznickname           = $user->nickname;
            $uaz->uazname               = $user->name;
            $uaz->uazemailtec           = $user->emailtec;
            $uaz->uazavatar             = $user->avatar;
            $uaz->uazdisplayName        = $user->user['displayName'];
            $uaz->uazgivenName          = $user->user['givenName'];
            $uaz->uazmail               = $user->user['mail'];
            $uaz->uazmobilePhone        = $user->user['mobilePhone'];
            $uaz->uazjobTitle           = $user->user['jobTitle'];
            $uaz->uazofficeLocation     = $user->user['officeLocation'];
            $uaz->uazpreferredLanguage  = $user->user['preferredLanguage'];
            $uaz->uazsurname            = $user->user['surname'];
            $uaz->uazuserPrincipalName  = $user->user['userPrincipalName'];

            $uaz->uaztokenlogin = $tokenlogin;
            $uaz->update();

        }else{
            $uazn = new uazusuariosazure;

            if($usu){
                $uazn->usuid = $usu->usuid;
            }

            $uazn->uazidob               = $user->id;
            $uazn->uaznickname           = $user->nickname;
            $uazn->uazname               = $user->name;
            $uazn->uazemailtec           = $user->emailtec;
            $uazn->uazavatar             = $user->avatar;
            $uazn->uazdisplayName        = $user->user['displayName'];
            $uazn->uazgivenName          = $user->user['givenName'];
            $uazn->uazmail               = $user->user['mail'];
            $uazn->uazmobilePhone        = $user->user['mobilePhone'];
            $uazn->uazjobTitle           = $user->user['jobTitle'];
            $uazn->uazofficeLocation     = $user->user['officeLocation'];
            $uazn->uazpreferredLanguage  = $user->user['preferredLanguage'];
            $uazn->uazsurname            = $user->user['surname'];
            $uazn->uazuserPrincipalName  = $user->user['userPrincipalName'];

            $uazn->uaztokenlogin = $tokenlogin;
            $uazn->save();
        }

        header("Location: http://localhost:3001/login-azure/".$tokenlogin);
        exit();

        dd($user);

        // token
        // id
        // nickname
        // name
        // email
        // avatar
        // user->displayName
        // user->givenName
        // user->jobTitle
        // user->mail
        // user->mobilePhone
        // user->officeLocation
        // user->preferredLanguage
        // user->surname
        // user->userPrincipalName
        // user->id

    }



    public function MostrarSesiones ()
    {

        session_start();

        $keys_sesion = array_keys($_SESSION);

        foreach ($keys_sesion as $key_sesion)

        {

        $$key_sesion = $_SESSION[$key_sesion];

        error_log("variable $key_sesion");

        }

        // foreach($_SESSION as $valor)

        // {

        // echo $valor.',';

        // }

    }
}
