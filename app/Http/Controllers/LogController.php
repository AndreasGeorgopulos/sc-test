<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Contracts\View\View;

/**
 * Controller of logs
 */
class LogController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $logs = Log::all();
        return view('log.index', compact('logs'));
    }
}
