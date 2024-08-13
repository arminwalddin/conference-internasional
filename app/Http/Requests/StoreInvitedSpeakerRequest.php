<?php

namespace App\Http\Requests;

use App\Honorary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreInvitedSpeakerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('ispeaker_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}
