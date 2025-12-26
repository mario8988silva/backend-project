<?php

return [

    'products' => [
        'index' => [
            ['products.index', 'Products'],
            ['brands.index', 'Brands'],
            ['subcategories.index', 'Subcategories'],
            ['categories.index', 'Categories'],
            ['families.index', 'Families'],
            ['unit-types.index', 'Unit Types'],
            ['iva-categories.index', 'IVA Categories'],
            ['nutri-scores.index', 'Nutri Scores'],
            ['eco-scores.index', 'Eco Scores'],
        ],
        'create' => [
            ['products.create', 'Product'],
            ['brands.create', 'Brand'],
            ['subcategories.create', 'Subcategory'],
            ['categories.create', 'Category'],
            ['families.create', 'Family'],
            ['unit-types.create', 'Unit Type'],
            ['iva-categories.create', 'IVA Category'],
            ['nutri-scores.create', 'Nutri Score'],
            ['eco-scores.create', 'Eco Score'],
        ],
    ],

    'suppliers' => [
        'index' => [
            ['suppliers.index', 'Suppliers'],
            ['representatives.index', 'Representatives'],
            ['categories.index', 'Categories'],
            ['products.index', 'Products'],
            ['invoices.index', 'Invoices'],
            ['orders.index', 'Orders'],
        ],
        'create' => [
            ['suppliers.create', 'Supplier'],
            ['representatives.create', 'Representative'],
            ['categories.create', 'Category'],
            ['products.create', 'Product'],
            ['invoices.create', 'Invoice'],
            ['orders.create', 'Order'],
        ],
    ],

    'users' => [
        'index' => [
            ['users.index', 'Team Member'],
        ],
        'create' => [
            ['users.create', 'Team Member'],
        ],
    ],

    // Add more sections here...
];
/*
'x' => [
        'index' => [
            ['x.index', 'X'],
        ],
        'create' => [
            ['x.create', 'X'],
        ],
    ],
*/