<?php

// CONTENTS: ------------------------------------------------
// STOCK MENU
$stocksMenu = [
    'index' => [
        ['stocks.index', 'Stocks'],
        ['stock-movements.index', 'Stock Movements'],
        ['sold-products.index', 'Sold Products'],
        //['waste-log.index', 'Waste Log'],
        ['locations.index', 'Locations'],
        //['statuses.index', 'Statuses'],
    ],
    'create' => [
        ['locations.create', 'Location'],
        //['statuses.create', 'Status'],
    ],
];

// SUPPLIERS MENU
$suppliersMenu = [
    'index' => [
        ['suppliers.index', 'Suppliers'],
        ['representatives.index', 'Representatives'],
    ],
    'create' => [
        ['suppliers.create', 'Supplier'],
        ['representatives.create', 'Representative'],
    ],
];

// ORDERS MENU
$ordersMenu = [
    'index' => [
        ['orders.index', 'Orders'],
        //['invoices.index', 'Invoices'],
    ],
    'create' => [
        ['overview.index', 'Order'],
    ],
];

// PRODUCTS MENU
$productsMenu = [
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
    ],
];

// TEAM MENU
// ---------
// WASTE LOG MENU

// APPLIANCE: ------------------------------------------------
return [
    // STOCK MENU
    'stocks'            => $stocksMenu,
    'stock-movements'   => $stocksMenu,
    'sold-products'     => $stocksMenu,
    //'waste log'         => $stocksMenu,
    'locations'         => $stocksMenu,
    'stasuses'          => $stocksMenu,


    // SUPPLIERS MENU
    'suppliers'         => $suppliersMenu,
    'representatives'   => $suppliersMenu,

    // ORDERS MENU
    'orders'            => $ordersMenu,

    // PRODUCTS MENU
    'products'          => $productsMenu,
    'brands'            => $productsMenu,
    'subcategories'     => $productsMenu,
    'categories'        => $productsMenu,
    'families'          => $productsMenu,
    'unit-types'        => $productsMenu,
    'iva-categories'    => $productsMenu,
    'nutri-scores'      => $productsMenu,
    'eco-scores'        => $productsMenu,

    // TEAM MENU
    'users' => [
        'index' => [
            ['users.index', 'Team Member'],
        ],
        'create' => [
            ['users.create', 'Team Member'],
        ],
    ],

    // WASTE LOG MENU
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