<?php
namespace App\Http\Requests;
use \Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;
class CreateRequest extends FormRequest
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
            'title'=>['required','min:8'],
            'slug'=>['required','min:8','regex:/^[0-9a-z\-]+$/'],
            'content'=>['required']
        ];
    }
    protected function prepareForValidation(){
        $this->merge([
            'slug'=>$this->input('slug') ?: Str::slug($this->input('title'))
        ]);
    }
}