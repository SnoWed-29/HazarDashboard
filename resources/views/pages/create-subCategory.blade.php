@extends('layouts.app')
@section('content')
    <div class=" p-1">
        <div class="container mx-auto flex justify-center py-1">
            <h1 class="text-2xl font-semibold text-center border-b border-gray-400">Ajouter Une SubCategory</h1>
        </div>

        <div class="w-3/4 mx-auto my-8 rounded-md shadow-xl p-2">
            <form action="{{route('createSubCategory')}}" method="POST">
                @csrf
                @method('POST')
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SubCategory Name*</label>
                        <input type="text" id="first_name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ex:vests..." required />
                    </div>
                    <div>
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug*</label>
                        <input type="text" id="last_name" name="slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required />
                    </div>
                    <div class="col-span-2">
                        <label for="Category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a Category</label>
                        <select name="category" id="subCategory" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($cats as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="text-white  focus:ring-4 focus:outline-none bg-[#1f2937] hover:bg-[#1f2937b5] font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Submit</button>
            </form>
        </div>


<div class="w-3/4 mx-auto p-2 shadow-xl rounded-md">
    <div class="relative overflow-x-auto">
        <table id="cats" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        slug
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subs as $cat)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$cat->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$cat->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$cat->slug}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    </div>
    
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js" ></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>

    new DataTable('#cats');

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
    input[type=search] {
        height: 33px;
        border-radius: 4px;
        margin: 0 10px;
    }
</style>
@endsection