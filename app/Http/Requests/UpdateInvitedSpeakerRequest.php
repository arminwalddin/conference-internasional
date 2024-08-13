<?php

namespace App\Http\Requests;

use App\Speaker;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateInvitedSpeakerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('ispeaker_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
