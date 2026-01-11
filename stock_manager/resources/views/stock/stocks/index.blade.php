@php
$columns = [
['product.id', 'ID'],

['quantity', 'Qty'],
['product.unit_type.name', 'Unit Type'],

['product.barcode', 'Barcode'],
['product.name', 'Product'],
['product.brand.name', 'Brand'],

['orderHasProduct.order_id', 'Order'],
['status.name', 'Status'],
['location.name', 'Location'],

['product.subcategory.name', 'Subcategory'],
['product.subcategory.category.name', 'Category'],
['product.subcategory.category.family.name', 'Family'],

//['product.iva_category.rate', 'IVA Category'],
['product.nutri_score.grade', 'Nutri Score'],
['product.eco_score.grade', 'Eco Score'],
['product.sugar_free', 'Sugar Free'],
['product.gluten_free', 'Gluten Free'],
['product.vegan', 'Vegan'],
['product.vegetarian', 'Vegetarian'],
['product.organic', 'Organic'],

['created_at', 'Created'],
['updated_at', 'Updated'],
];

$filtersLabels = [
'Product',
'Status',
'Location',

'Subcategory',
'Category',
'Family',
'Brand',
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
view('components.filter-select', [
'name' => 'product_id',
'options' => $products,
'selected' => request('product_id'),
])->render(),

view('components.filter-select', [
'name' => 'status_id',
'options' => $statuses,
'selected' => request('status_id'),
])->render(),

view('components.filter-select', [
'name' => 'location_id',
'options' => $locations,
'selected' => request('location_id'),
])->render(),


view('components.filter-select', ['name' => 'subcategory_id', 'label' => 'Subcategory', 'options' => $subcategories])->render(),
view('components.filter-select', ['name' => 'category_id', 'label' => 'Category', 'options' => $categories])->render(),
view('components.filter-select', ['name' => 'family_id', 'label' => 'Family', 'options' => $families])->render(),
view('components.filter-select', ['name' => 'brand_id', 'label' => 'Brand', 'options' => $brands])->render(),

view('components.filter-select', ['name' => 'unit_type_id', 'label' => 'Unit Type', 'options' => $unit_types])->render(),
view('components.filter-select', ['name' => 'iva_category_id', 'label' => 'Iva Category','options' => $iva_categories])->render(),
view('components.filter-select', ['name' => 'nutri_score_id', 'label' => 'Nutri Score', 'options' => $nutri_scores])->render(),
view('components.filter-select', ['name' => 'eco_score_id', 'label' => 'Eco Score', 'options' => $eco_scores])->render(),

view('components.filter-boolean', ['name' => 'sugar_free'])->render(),
view('components.filter-boolean', ['name' => 'gluten_free'])->render(),
view('components.filter-boolean', ['name' => 'vegan'])->render(),
view('components.filter-boolean', ['name' => 'vegetarian'])->render(),
view('components.filter-boolean', ['name' => 'organic'])->render(),

view('components.filter-text', ['name' => 'search', 'label' => 'Search'])->render(),

];
@endphp

<x-index title="Stock List" :columns="$columns" :filtersLabels="$filtersLabels" :filters="$filters" :items="$stocks" />

{{ $stocks->links() }}
