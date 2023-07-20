<?php

namespace App\Http\Controllers\API;

use App\View\Components\Button;
use App\View\Components\Forms\Input;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Stat;

class StatController extends BaseController
{
    public function index() {
        $stats = Stat::all();
        foreach( $stats as $stat ) {
            Log::info($stat);
        }

        return view('components.sample-stats')->with('stats', $stats);
    }

    public function update(Request $request, $id) {
        $stat = Stat::find($id);
        Log::debug($request->all());
        Log::debug($stat);

        $stat->update($request->except('is_active'));
        $stat->is_active = $request->has('is_active');
        $stat->save();

        return view('components.stat')->with('stat', $stat);
    }
}
