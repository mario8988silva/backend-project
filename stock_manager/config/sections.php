<?php

$referenceMenu = [
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
];

$suppliersMenu = [
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
];

return [

    // Reference domain (all share the same menu)
    'products'       => $referenceMenu,
    'brands'         => $referenceMenu,
    'subcategories'  => $referenceMenu,
    'categories'     => $referenceMenu,
    'families'       => $referenceMenu,
    'unit-types'     => $referenceMenu,
    'iva-categories' => $referenceMenu,
    'nutri-scores'   => $referenceMenu,
    'eco-scores'     => $referenceMenu,

    // Business domain
    'suppliers'       => $suppliersMenu,
    'representatives' => $suppliersMenu,

    // Users domain
    'users' => [
        'index' => [
            ['users.index', 'Team Member'],
        ],
        'create' => [
            ['users.create', 'Team Member'],
        ],
    ],
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