<?php

namespace App\Helpers;

use App\Models\Notificacion;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PushNotify{

	public function push($notify = null, $user = null, $status = 0){

		if(is_string($user)){
			$user = User::where('usuario','=',$user)->first();
			$user = $user->id;
		}

		$notify = DB::table('notificaciones')->insert(
			['Notificacion' => $notify, 'Id_Usuario' => $user, 'Estado' => $status, 'created_at' => Carbon::now()]
		);
		
		return $notify;
	}
}