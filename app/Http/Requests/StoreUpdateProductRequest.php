<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
        $id=$this->segment(2);
        return [
            'name'=>"required|min:3|max:255|unique:products,name,{$id},id",
            'description'=> 'required|min:3|max:10000',
            'price'=>"required|regex:/^\d+(\.\d{1,2})>?/",
            'image'=>'nullable|image',
        ];
    }
    public function messages()
    {
        return [
            'price.regex'=>'Formato de Preço deve ser escrito neste formato: 100.00',
            'price.required'=>'Preço Obrigatorio',
            'name.unique'=>'Este Nome ja existe',
            'name.required' =>' Nome é Obrigatorio',
            'name.min' =>' Ops! Precisa informa pelo menos 3 caracteres',
            'image.required'=>'Imagem é Obrigatorio'
        ];
    }
}
