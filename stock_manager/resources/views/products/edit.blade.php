@extends('products._form')

@section('name', 'Edit Product')

@section('slot')
@include('products._form', [
'brands' => $brands,
'categories' => $categories,
'eco_scores' => $eco_scores,
'families' => $families,
'iva_categories' => $iva_categories,
'nutri_scores' => $nutri_scores,
'subcategories' => $subcategories,
'unit_types' => $unit_types
])
@endsection
