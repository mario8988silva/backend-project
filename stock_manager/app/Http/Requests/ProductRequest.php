<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'barcode' => 'nullable|string|max:45|unique:products,barcode,' . $this->route('product')->id,
            'name' => 'required|string|max:255',
            'image' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'unit_type_id' => 'nullable|exists:unit_types,id',
            'iva_category_id' => 'nullable|exists:iva_categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'nutri_score_id' => 'nullable|exists:nutri_scores,id',
            'eco_score_id' => 'nullable|exists:eco_scores,id',
            // 'expiry_date' => 'nullable|date', // REMOVER! PERTENCE AO STOCK
            'sugar_free' => 'nullable|boolean',
            'gluten_free' => 'nullable|boolean',
            'lactose_free' => 'nullable|boolean',
            'vegan' => 'nullable|boolean',
            'vegetarian' => 'nullable|boolean',
            'organic' => 'nullable|boolean',
        ];
    }
}
