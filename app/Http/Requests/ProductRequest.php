<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
            'cate_id' => 'required',
            'name' => 'required|unique:products,name',
            'image' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'cate_id.required' => 'Vui lòng chọn category!',
            'name.required' => 'Vui lòng nhập tên sản phẩm!',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'image.required' => 'Vui lòng chọn ảnh cho sản phẩm!'
        ];
    }
}
