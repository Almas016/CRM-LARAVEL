<?php

namespace App\Http\Controllers\Admin\Prospects;

use App\Http\Controllers\Controller;
use App\Models\Prospect;
use Illuminate\Http\Request;

class ProspectDashboardController extends Controller
{
    public function index(Prospect $prospect)
    {
        return view('admin.prospects.prospect.index', ['prospect' => $prospect]);
    }
}
