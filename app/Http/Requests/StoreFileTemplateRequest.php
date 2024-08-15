<?php

namespace App\Http\Requests;

use App\FileTemplate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreFileTemplateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('filetemplate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'path'   => [
                'required',
            ],
            'category'   => [
                'required',
            ],
        ];
    }
}
