@extends('layouts.app')
@section('content')
<div class="container">
    <div class="flex w-11/12 mx-auto justify-between my-2">
        <h1 class="text-2xl font-semibold mb-2">Products List</h1>
        <button id="add-variants" type="button" class="bg-blue-500 text-white px-4 py-1 rounded mt-2"><b>+</b> Add Product</button>
    </div>
    <div class="relative overflow-x-auto">
        <!-- Search bar and Show entries elements -->
        <div class="flex justify-between items-center mb-4">
            <div id="dataTable-filter" class="flex items-center space-x-2">
            </div>
            <div id="dataTable-entries" class="flex items-center space-x-2">
                <!-- DataTables Show entries -->
            </div>
        </div>

        <!-- DataTable -->
        <table id="cats" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">id</th>
                    <th scope="col" class="px-6 py-3">name</th>
                    <th scope="col" class="px-6 py-3">slug</th>
                    <th scope="col" class="px-6 py-3">price</th>
                    <th scope="col" class="px-6 py-3">cost</th>
                    <th scope="col" class="px-6 py-3">Colors</th>
                    <th scope="col" class="px-6 py-3">Category</th>
                    <th scope="col" class="px-6 py-3">SubCategory</th>
                    <th scope="col" class="px-6 py-3">Quantity</th>
                </tr>
            </thead>
            <tbody>
                <!-- DataTables will populate this -->
            </tbody>
        </table>
    </div>
</div>

<!-- DataTables JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#cats').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('listProducts.data') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'slug', name: 'slug' },
                { data: 'price', name: 'price' },
                { data: 'cost', name: 'cost' },
                { data: 'colors', name: 'colors' },
                { data: 'category', name: 'category' },
                { data: 'sub_category', name: 'sub_category' },
                { data: 'quantity', name: 'quantity' }
            ]
        });

        // Adjust DataTables Search Input and Show entries
        $('#cats_filter input').addClass('form-input px-3 py-1 border rounded-md');
        $('#cats_length select').addClass('form-select px-3 py-1 border rounded-md');
        $('#cats_filter').addClass('flex items-center space-x-2');
        $('#cats_length').addClass('flex items-center space-x-2');
    });
</script>

<style>
    /* Custom styles for DataTables elements */
    #cats_filter {
        float: right;
    }

    #cats_length {
        float: left;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 0.25rem 0.5rem;
        margin: 0.25rem; /* Add vertical margin here */
        border-radius: 0.375rem;
        border: 1px solid #ddd;
        background-color: #f9fafb;
        color: #4b5563;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background-color: #e5e7eb;
    }

    .dataTables_wrapper .dataTables_paginate {
        margin-top: 1rem; /* Add some space above the pagination controls */
        margin-bottom: 1rem; /* Add some space below the pagination controls */
    }
</style>

@endsection
