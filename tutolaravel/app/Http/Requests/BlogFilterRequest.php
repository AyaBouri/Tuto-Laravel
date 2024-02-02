<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
class BlogFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>['require','min:4'],
            'slug'=>['require','regexp:/^[a-z0-9\-]+$/']
        ];
    }
    protected function prepareForValidation(){
        $this->merge([
            'slug'=>$this->input('slug')?: Str::slug($this->input('title'))
        ]);
    }
}