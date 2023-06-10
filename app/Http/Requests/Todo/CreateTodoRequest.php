<?php

namespace App\Http\Requests\Todo;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateTodoRequest
 * 
 * @author Keannu Rim Kristoffer C. Regala <keannu>
 * @since 2023.06.11
 */
class CreateTodoRequest extends FormRequest
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
    public function rules() : array
    {
        return [
            'task' => [ 'required', 'string' ]
        ];
    }
}
