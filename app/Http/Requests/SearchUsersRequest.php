<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int $ageMin
 * @property int $ageMax
 * @property string $name
 */

class SearchUsersRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|regex:/^[A-Za-zА-Яа-я]+( [A-Za-zА-Яа-я]+)?$/',
            'ageMin' => 'integer|min:1|max:100',
            'ageMax' => 'integer|min:1|max:100|different:ageMin',
        ];
    }
}
