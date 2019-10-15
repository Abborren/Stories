<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoriesRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'role' => 'required',
            'activity' => 'required',
            'preposition' => 'required',
            'context' => 'required',
            'reason' => 'required',
        ];
    }

    /**
     * Changes the request after the validator is finished.
     */
    public function withValidator($validator)
    {
        $validator->after(function () {
            $story = vsprintf('Som en %s vill jag %s %s %s för att %s.', array_values($this->except('_token')));
            $this->request->add([
                'body' => $story
                ]);
        });
    }
}
