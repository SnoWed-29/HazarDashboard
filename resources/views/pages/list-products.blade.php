@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="flex w-11/12 mx-auto justify-between my-2">
            <h1 class="text-2xl font-semibold mb-2">Products List</h1>
            <button id="add-variants" type="button" class="bg-blue-500 text-white px-4 py-1 rounded mt-2"><b>+</b> Add
                Product</button>
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
                                <img src="{{Storage::url($prod->images[0]->path)}}" alt="Spotify"
                                    class="inline-block relative object-center !rounded-full w-12 h-12 rounded-lg border border-blue-gray-50 bg-blue-gray-50/50 object-contain p-1">
                                <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-bold">
                                    {{$prod->name}}</p>
                            </div>
                        </td>
                        <td class="p-4 border-b border-blue-gray-50">
                            <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">
                                {{$prod->slug}}</p>
                        </td>
                        <td class="p-4 border-b border-blue-gray-50">
                            <div class="w-max">
                                <div class="relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none bg-green-500/20 text-green-900 py-1 px-2 text-xs rounded-md" style="opacity: 1;">
                                    <span class="">{{ number_format($prod->price, 0) }}Dh</span>
                                </div>
                            </div>
                        </td>
                        <td class="p-4 border-b border-blue-gray-50">
                            <div class="w-max">
                                <div class="relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none bg-green-500/20 text-green-900 py-1 px-2 text-xs rounded-md" style="opacity: 1;">
                                    <span class="">{{ number_format($prod->cost, 0) }}Dh</span>
                                </div>
                            </div>
                        </td>
                        
                        <td class="p-4 border-b border-blue-gray-50">
                            <div class="w-full grid grid-cols-2 gap-1 ">
                                @foreach ($prod->colors as $color)
                                    
                                <span
                                    class="relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white py-1 px-2 text-xs rounded-md"
                                    style="opacity: 1;">{{$color->name}}</span>
                                @endforeach
                                    
                            </div>
                        </td>

                        <td class="p-4 border-b border-blue-gray-50">
                            <div class=" ">
                                <span
                                    class=" font-sans font-bold   select-none bg-[#1f2937] text-white p-2 text-center  text-s rounded-md"
                                    style="opacity: 1;">{{$prod->subCategory->category->name}} </span>

                            </div>
                        </td>

                        <td class="p-4 border-b border-blue-gray-50">
                            <div class="w-full ">
                                <div class=" ">
                                    <span
                                        class=" font-sans font-bold   select-none bg-[#1f2937] text-white p-2 text-center  text-s rounded-md"
                                        style="opacity: 1;">{{$prod->subCategory->name}}</span>

                                </div>
                        </td>
                        <td class="p-4 border-b border-blue-gray-50">
                            <div class="w-max">
                                <div class="flex justify-center align-center font-sans font-bold uppercase whitespace-nowrap select-none bg-green-500/20 text-green-900 py-1 px-2 text-xs rounded-md"
                                    style="opacity: 1;">
                                    <span class="">{{$prod->prodColorSizes->sum('quantity')}}</span>
                                </div>
                            </div>
                        </td>
                        <td class="p-4 border-b border-blue-gray-50">
                            <div class="w-full grid grid-cols-2 gap-1 p-2">
                                <a href="#"
                                    class="relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none shadow-xl border  bg-[#28a745] text-white py-2 px-4 text-xl rounded-md"
                                    style="opacity: 1;">
                                    <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                        <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            aria-hidden="true" class="h-[25PX]">
                                            <path
                                                d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z">
                                            </path>
                                        </svg>
                                    </span>
                                </a>
                                <a href="#" class="relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none bg-[#17a2b8] text-white py-2 px-4 text-xs rounded-md"
                                    style="opacity: 1;">PLACE AN ORDER</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    </div>
    <!-- DataTables JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#cats').DataTable();


            $('#cats_filter input').addClass('form-input px-3 py-1 border rounded-md my-2');
            $('#cats_length select').addClass('form-select px-3 py-1 border rounded-md my-2');
            $('#cats_filter').addClass('flex items-center space-x-2 my-2');
            $('#cats_length').addClass('flex items-center space-x-2 my-2');
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
