<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Log;
use Dingo\Api\Routing\Helpers;
use App\Transformer\UserTransformer;

class UserController extends Controller
{
    use Helpers;

    public function showProfile(Request $request)
    {
        // Log::info('Showing user profile for user: '.$request->user()->id." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        $user = User::where('api_token', '=', $request->get('api_token'))->get();
        return $this->response->collection($user, new UserTransformer);
    }
}
