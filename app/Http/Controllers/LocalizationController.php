<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LocalizationController extends Controller
{
	public function set_language(Request $request)
	{
		$lang = $request->lang;

		\App::setLocale($lang);

		return response()->json(['message' => 'success']);
	}
}
