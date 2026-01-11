<x-order-index title="Create Order" submitLabel="Create Order" :columns="[
        ['id', 'ID'],
        ['name', 'Product'],
        ['brand.name', 'Brand'],
        ['subcategory.name', 'Subcategory'],
        ['subcategory.category.name', 'Category'],
        ['subcategory.category.family.name', 'Family'],
        ['nutri_score.grade', 'Nutri Score'],
        ['eco_score.grade', 'Eco Score'],
        ['sugar_free', 'Sugar Free'],
        ['gluten_free', 'Gluten Free'],
        ['vegan', 'Vegan'],
        ['vegetarian', 'Vegetarian'],
        ['organic', 'Organic'],
    ]" :items="$products" :sessionQuantities="$sessionQuantities" />

{{ $products->links() }}

@include('partials.order-scripts')
