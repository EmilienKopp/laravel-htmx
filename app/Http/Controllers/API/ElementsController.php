<?php

namespace App\Http\Controllers\API;

use App\View\Components\Button;
use App\View\Components\Forms\Input;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ElementsController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function forms(Request $request, $type) {
        switch ($type) {
            case 'text':
                Log::info('text component required');
                $inputComponent = new Input(
                    label: $request->input('label','Text Input'),
                    name: $request->input('name'),
                    placeholder: $request->input('placeholder'),
                    type: $request->input('type'),
                    value: $request->input('value'),
                    class: $request->input('class'),
                    id: $request->input('id'),
                );
                return $inputComponent->render()->with($inputComponent->data());
            case 'button':
                Log::info('button component required');
                $buttonComponent = new Button(
                    label: $request->input('label','Button'),
                );
                return $buttonComponent->render()->with($buttonComponent->data());
            case 'user':
                Log::info('user form component required');
                return view('components.forms.user');
        }
    }

    public function divs(Request $request) {
        $content = $request->input('content', "Nothing to see here...");

        return view('components.atoms.text-div')->with([
            'content' => $content,
        ]);
    }

}
