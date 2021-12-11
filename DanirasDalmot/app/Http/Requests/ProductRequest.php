<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|required',
            'description' => 'string|required',
            'photo' => 'required|max:5120',
            'retail_price' => 'required',
            'discount' => 'required',
            'price' => 'required',
            'brand_name' => 'string|required',
            'size' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Product Name is required',
            'description.required' => 'Product Description is required',
            'photo.required' => 'Product Photo is required',
            'photo.max' => 'Product Photo is too large (max: 5MB)',
            'retail_price.required' => 'Product Retail price is required',
            'discount.required' => 'Product Discount is required',
            'price.required' => 'Product Price is required',
            'brand_name.required' => 'Product Brand name is required',
            'size.required' => 'Prodcut Size is required'
        ];
    }
}
