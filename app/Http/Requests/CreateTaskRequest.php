<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'taskTitle' => ['string', 'required'],
            'taskDescription' => ['string', 'required'],
            'assigneeUserId' => ['int', 'required', 'exists:users,user_id'],
            'reporterAdminId' => ['int', 'required', 'exists:users,user_id'],
        ];
    }
}
