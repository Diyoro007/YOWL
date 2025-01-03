<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\UserStoreRequest; // Ne pas oublier

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $user_id = $this->user->id ?? null; // L'indentifiant de l'utilisateur
        return [
            //
            "name" => "required|string|max:100",
            "email" => "required|unique:users".(isset($user_id) ? ",email,".$user_id : ""),
            "password" => "required|min:8"
        ];
    }
    public function store(UserStoreRequest $request)
    {
        // ...
    }

public function update(UserStoreRequest $request, User $user)
    {
        // ...
    }
}
