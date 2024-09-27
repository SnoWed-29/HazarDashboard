@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="flex w-11/12 mx-auto justify-between my-2">
            <h1 class="text-2xl font-semibold mb-2">Products List</h1>
            <a href="{{route('addProdcutPage')}}" id="add-variant"  class="bg-blue-500 text-white px-4 py-1 rounded mt-2"><b>+</b> Add
                Product</a>
        </div>

        <div class="flex  items-center justify-center bg-white shadow-xl rounded-md">
            <div class="p-6 px-0 w-full">
                <table id="cats" class="w-full min-w-max table-auto text-left my-4">
                    <thead>
                        <tr>
                             <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                                <p
                                    class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">
                                </p>
                            </th>
                            <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                                <p
                                    class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">
                                    Slug</p>
                            </th>
                            <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                                <p
                                    class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">
                                    Price</p>
                            </th>
                            <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                                <p
                                    class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">
                                    Cost</p>
                            </th>
                            <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                                <p
                                    class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">
                                    Colors</p>
                            </th>
                            <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                                <p
                                    class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">
                                    Category</p>
                            </th>
                            <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                                <p
                                    class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">
                                    SubCategory</p>
                            </th>
                            <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                                <p
                                    class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">
                                    Total Quantity</p>
                            </th>
                            <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                                <p
                                    class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">
                                    Action</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $prod)
                            <tr>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ Storage::url($prod->images[0]->path) }}" alt="Spotify"
                                            class="inline-block relative object-center !rounded-full w-12 h-12 rounded-lg border border-blue-gray-50 bg-blue-gray-50/50 object-contain p-1">
                                        <p
                                            class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-bold">
                                            {{ $prod->name }}</p>
                                    </div>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">
                                        {{ $prod->slug }}</p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="w-max">
                                        <div class="relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none bg-green-500/20 text-green-900 py-1 px-2 text-xs rounded-md"
                                            style="opacity: 1;">
                                            <span class="">{{ number_format($prod->price, 0) }}Dh</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="w-max">
                                        <div class="relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none bg-green-500/20 text-green-900 py-1 px-2 text-xs rounded-md"
                                            style="opacity: 1;">
                                            <span class="">{{ number_format($prod->cost, 0) }}Dh</span>
                                        </div>
                                    </div>
                                </td>

                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="w-full grid grid-cols-2 gap-1">
                                        @foreach ($prod->colors->unique('name') as $color)
                                            <span
                                                class="relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white py-1 px-2 text-xs rounded-md"
                                                style="opacity: 1;">{{ $color->name }}</span>
                                        @endforeach
                                    </div>
                                </td>


                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class=" ">
                                        <span
                                            class=" font-sans font-bold   select-none bg-[#1f2937] text-white p-2 text-center  text-s rounded-md"
                                            style="opacity: 1;">{{ $prod->subCategory->category->name }} </span>

                                    </div>
                                </td>

                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="w-full ">
                                        <div class=" ">
                                            <span
                                                class=" font-sans font-bold   select-none bg-[#1f2937] text-white p-2 text-center  text-s rounded-md"
                                                style="opacity: 1;">{{ $prod->subCategory->name }}</span>

                                        </div>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="w-max">
                                        <div class="flex justify-center align-center font-sans font-bold uppercase whitespace-nowrap select-none bg-green-500/20 text-green-900 py-1 px-2 text-xs rounded-md"
                                            style="opacity: 1;">
                                            <span class="">{{ $prod->prodColorSizes->sum('quantity') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="w-full grid grid-cols-2 gap-1 p-2">
                                        <a href="{{ route('editProduct', ['slug' => $prod->slug]) }}"
                                            class="relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none shadow-xl border  bg-[#28a745] text-white py-2 px-4 text-xl rounded-md"
                                            style="opacity: 1;">
                                            <span
                                                class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" aria-hidden="true" class="h-[25PX]">
                                                    <path
                                                        d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </a>
                                        <button type="button" data-modal-target="default-modal"
                                            data-modal-toggle="default-modal" data-product-id="{{ $prod->id }}"
                                            class="place-order-button bg-[#17a2b8] text-white py-2 px-4 rounded">PLACE AN
                                            ORDER</button>


                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- Main modal -->
    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center w-full justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl flex justify-between w-1/3 font-semibold text-gray-900 dark:text-white">
                        Place an Order 
                    </h3>
                    <div class="w-1/3 flex justify-end">
                        <button id="add-variants" type="button"
                            class="bg-blue-500 text-white rounded mt-2 h-fit p-1"><b>+</b> Add More</button>
                    </div>
                    <button type="button"
                        class="text-gray-400 bg-transparent w-1/3 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="{{route('placeOrder', ['prodId'=>$prod->id])}}" method="POST" id="cntr-inputs"
                    class="p-4 md:p-5 flex flex-col space-y-4 w-full">
                    @csrf
                    @method('POST')

                    <div class="input-container flex space-x-2">
                        <select name="variants[colors][]" class="border border-gray-300 rounded px-2 py-1 color-select">
                            {{-- <option value="">Color</option> --}}
                        </select>
                        <select name="variants[sizes][]" class="border border-gray-300 rounded px-2 py-1 size-select">
                            {{-- <option value="">Size</option> --}}
                        </select>
                        <input type="number" name="variants[quantities][]"
                            class="border border-gray-300 rounded px-2 py-1 w-16 h-fit" placeholder="Qty">
                    </div>
                </form>

                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button id="submit-btn"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                    Validate</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cats').DataTable();

            var products = @json($products);

            $(document).on('click', '.place-order-button', function() {
                var productId = $(this).data('product-id');
                $('#default-modal').data('product-id', productId);

                var $prod = products.find(p => p.id == productId);

                if ($prod) {
                    var colorOptions = $prod.colors.map(color =>
                        `<option value="${color.id}">${color.name}</option>`).join('');
                    $('.color-select').html(`<option value="">Select Color</option>${colorOptions}`);
                    $('.size-select').html(`<option value="">Select Size</option>`);
                } else {
                    console.error('Product not found for id:', productId);
                }
            });

            $('#add-variants').click(function() {
                var productId = $('#default-modal').data('product-id');
                var $prod = products.find(p => p.id == productId);

                if ($prod) {
                    var colorOptions = $prod.colors.map(color =>
                        `<option value="${color.id}">${color.name}</option>`).join('');

                    var variantTemplate = `
                <div class="input-container flex space-x-2">
                    <select name="variants[colors][]" class="border border-gray-300 rounded px-2 py-1 color-select">
                        ${colorOptions}
                    </select>
                    <select name="variants[sizes][]" class="border border-gray-300 rounded px-2 py-1 size-select">
                        <option value="">Select Size</option>
                    </select>
                    <input type="number" name="variants[quantities][]" class="border border-gray-300 rounded px-2 py-1 w-16" placeholder="Qty">
                    <button type="button" class="remove-variant bg-red-500 text-white px-2 py-1 rounded">Remove</button>
                </div>`;
                    $('#cntr-inputs').append(variantTemplate);
                } else {
                    console.error('Product not found for id:', productId);
                }
            });

            $(document).on('change', '.color-select', function() {
                var selectedColorId = $(this).val();
                var productId = $('#default-modal').data('product-id');

                if (selectedColorId && productId) {
                    $.ajax({
                        url: `/product/${productId}/sizes/${selectedColorId}`,
                        method: 'GET',
                        success: function(response) {
                            var sizeOptions = response.map(size =>
                                `<option value="${size.id}">${size.name}</option>`).join('');
                            $(this).closest('.input-container').find('.size-select').html(
                                `<option value="">Select Size</option>` + sizeOptions);
                        }.bind(this),
                        error: function(xhr) {
                            console.error('Error fetching sizes:', xhr.responseText);
                        }
                    });
                } else {
                    $(this).closest('.input-container').find('.size-select').html(
                        `<option value="">Select Size</option>`);
                }
            });

            $(document).on('click', '.remove-variant', function() {
                $(this).closest('.input-container').remove();
            });
        });
        document.getElementById('submit-btn').addEventListener('click', function() {
        document.getElementById('cntr-inputs').submit();
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
            margin: 0.25rem;
            /* Add vertical margin here */
            border-radius: 0.375rem;
            border: 1px solid #ddd;
            background-color: #f9fafb;
            color: #4b5563;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #e5e7eb;
        }

        .dataTables_wrapper .dataTables_paginate {
            margin-top: 1rem;
            /* Add some space above the pagination controls */
            margin-bottom: 1rem;
            /* Add some space below the pagination controls */
        }

        input[type=search] {
            height: 33px;
            border-radius: 4px;
            margin: 0 10px;
        }
    </style>
@endsection
