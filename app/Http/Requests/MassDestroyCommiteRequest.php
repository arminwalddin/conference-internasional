<?php

namespace App\Http\Requests;

use App\Commite;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCommiteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('commite_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:commite,id',
        ];
    }
}
