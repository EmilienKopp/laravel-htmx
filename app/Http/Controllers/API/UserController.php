<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\View\Components\Button;
use App\View\Components\Forms\Input;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class UserController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(Request $request) {
        $usersTable = User::buildTable();
        
        return view('components.organisms.generic-table', [
            'table' => $usersTable,
        ]);
    }


    public function update(Request $request, $id) {
        $user = User::find($id);
        $user->update($request->all());
        $user->save();
    }
}
