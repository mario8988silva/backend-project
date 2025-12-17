<ul>
    <li>
        See All...
        <select name="x" onchange="if(this.value) window.location.href=this.value;">
            <option value="" selected> </option>
            <option value="{{ route('products.index') }}" selected>Products</option>
            {{--
            <option value="">Brands</option>
            <option value="">Subcategories</option>
            <option value="">Families</option>
            <option value="">Unit Types</option>
            <option value="">IVA Categories</option>
            <option value="">Nutri Scores</option>
            <option value="">Eco Scores</option>
            --}}
        </select>
    </li>

    <li>
        Add New..
        <select name="y" onchange="if(this.value) window.location.href=this.value;">
            <option value="" selected> </option>
            <option value="{{ route('products.create') }}">Product</option>
            {{--
            <option value="">Brand</option>
            <option value="">Subcategory</option>
            <option value="">Family</option>
            <option value="">Unit Type</option>
            <option value="">IVA Category</option>
            <option value="">Nutri Score</option>
            <option value="">Eco Score</option>
            --}}
        </select>
    </li>
</ul>
<hr>
