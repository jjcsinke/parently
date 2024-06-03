<?php

namespace App\Http\Requests\Children;

use App\Enums\UserType;
use App\Models\Child;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Create extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //Auth::user()->can('create', Child::class);
    }

    protected function prepareForValidation()
    {
        $user = Auth::user();
        if ($user->type === UserType::Parent) {
            $this->merge([
                'parent_ids' => [$user->id],
            ]);
        }

        $this->merge([
            'date_of_birth' => Carbon::parse($this->date_of_birth)?->format('Y-m-d'),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            'parent_ids' => ['required', 'array', 'exists:users,id'],
        ];
    }
}
