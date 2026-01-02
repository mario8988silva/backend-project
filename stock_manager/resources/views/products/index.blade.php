@php
$columns = [
    ['updated_at', 'Updated At'],
    ['barcode', 'Barcode'],
    ['name', 'Name'],
    ['brand.name', 'Brand'],
    ['subcategory.name', 'Subcategory'],
    ['subcategory.category.name', 'Category'],
    ['subcategory.category.family.name', 'Family'],
    ['unit_type.name', 'Unit Type'],
    ['iva_category.rate', 'IVA Category'],
    ['nutri_score.grade', 'Nutri Score'],
    ['eco_score.grade', 'Eco Score'],
    ['sugar_free', 'Sugar Free'],
    ['gluten_free', 'Gluten Free'],
    ['vegan', 'Vegan'],
    ['vegetarian', 'Vegetarian'],
    ['organic', 'Organic'],
];

$filtersLabels = [
    'Brand',
    'Subcategory',
    'Category',
    'Family',
    'Unit Type',
    'IVA Category',
    'Nutri Score',
    'Eco Score',
    'Sugar Free',
    'Gluten Free',
    'Vegan',
    'Vegetarian',
    'Organic',
    'Search',
];

$filters = [
    view('components.filter-select', ['name' => 'brand_id', 'options' => $brands])->render(),
    view('components.filter-select', ['name' => 'subcategory_id', 'options' => $subcategories])->render(),
    view('components.filter-select', ['name' => 'category_id', 'options' => $categories])->render(),
    view('components.filter-select', ['name' => 'family_id', 'options' => $families])->render(),
    view('components.filter-select', ['name' => 'unit_type_id', 'options' => $unit_types])->render(),
    view('components.filter-select', ['name' => 'iva_category_id', 'options' => $iva_categories])->render(),
    view('components.filter-select', ['name' => 'nutri_score_id', 'options' => $nutri_scores])->render(),
    view('components.filter-select', ['name' => 'eco_score_id', 'options' => $eco_scores])->render(),

    view('components.filter-boolean', ['name' => 'sugar_free'])->render(),
    view('components.filter-boolean', ['name' => 'gluten_free'])->render(),
    view('components.filter-boolean', ['name' => 'vegan'])->render(),
    view('components.filter-boolean', ['name' => 'vegetarian'])->render(),
    view('components.filter-boolean', ['name' => 'organic'])->render(),

    view('components.filter-text', ['name' => 'search', 'label' => 'Search'])->render(),
];
@endphp

<x-index 
    title="Products List"
    :columns="$columns"
    :filtersLabels="$filtersLabels"
    :filters="$filters"
    :items="$products"
/>

{{ $products->links() }}
