<?php

namespace App\Http\Requests;

use App\Task;
use Illuminate\Validation\Rule;

class EditPost extends CreatePost
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'content' => 'required|max:300',
        ];
    }
}
