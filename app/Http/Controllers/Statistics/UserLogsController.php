<?php 

namespace App\Http\Controllers\Statistics;

use Excel;
use App\Http\Requests;
use App\Models\Cms\UserLogs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserLogsController extends Controller
{
	public function index()
	{
		$logs = UserLogs::orderBy('created_at', 'asc')->get();

		return view('statistics.user-logs', compact('logs'));
	}
}