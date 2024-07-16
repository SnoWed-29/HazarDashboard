@extends('layouts.app')
<style>
    .preview {
        display: inline-block;
        margin: 10px;
    }
    .preview img {
        width: 100px;
        height: 100px;
        margin-right: 10px;
    }
    .preview button {
        display: block;
        margin-top: 5px;
        cursor: pointer;
        background-color: red;
        color: white;
        border: none;
        padding: 5px;
        border-radius: 5px;
    }   
</style>
@section('content')
    <div class="p-1">
        <div class="container mx-auto flex justify-center py-1">
            <h1 class="text-2xl font-semibold text-center border-b border-gray-400">Ajouter Un Produit</h1><br>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        </div>

        <div class="w-3/4 mx-auto my-8">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name*</label>
                        <input value="{{$product->name}}" type="text" id="first_name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ex:vest..." required />
                    </div>
                    <div>
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price*</label>
                        <input type="text" id="last_name" value="{{$product->price}}" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required />
                    </div> 
                    
                    <div class="col-span-2">
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">cost*</label>
                        <input type="text" id="last_name" value="{{$product->cost}}" name="cost" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required />
                    </div> 
                    <div class="col-span-2">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="message" rows="4" name="description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your description here...">{{$product->description}}</textarea>
                    </div>
                    
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a Category</label>
                        <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($cats as $cat)
                                <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="subCategory" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a SubCategory</label>
                        <select name="subCategory" id="subCategory" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" disabled {{ is_null($product->sub_category_id) ? 'selected' : '' }}>Choose a subcategory</option>
                            @foreach ($subs as $subCat)
                                <option value="{{ $subCat->id }}" {{ $subCat->id == $product->sub_category_id ? 'selected' : '' }}>{{ $subCat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-span-2">                        
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="images">Select Images</label>
                        <input class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file" id="file-input" name="images[]" multiple accept="image/*">
                        <div id="preview-container" class="grid grid-cols-5 gap-4">
                           
                            @foreach ($product->images as $img)
                            
                            <img class="object-cover h-36 w-48" src="{{ Storage::url($img->path) }}">


                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-span-2 flex justify-around my-2">
                    <div class="flex items-center space-x-2">
                        <input value="1" name="isActive" id="checkbox1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ $product->is_active ? 'checked' : '' }}>
                        <label for="checkbox1" class="text-sm font-medium text-gray-900 dark:text-gray-300">is Active</label>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input value="1" name="inStock" id="checkbox2" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ $product->in_stock ? 'checked' : '' }}>
                        <label for="checkbox2" class="text-sm font-medium text-gray-900 dark:text-gray-300">in Stock</label>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input value="1" name="isFeatured" id="checkbox3" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ $product->is_featured ? 'checked' : '' }}>
                        <label for="checkbox3" class="text-sm font-medium text-gray-900 dark:text-gray-300">is Featured</label>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input value="1" name="onSale" id="checkbox4" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ $product->on_sale ? 'checked' : '' }}>
                        <label for="checkbox4" class="text-sm font-medium text-gray-900 dark:text-gray-300">on Sale</label>
                    </div>
                </div>
                
                
                <button type="submit" class="text-white focus:ring-4 focus:outline-none bg-[#1f2937] hover:bg-[#1f2937b5] font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
            </form>
        </div>

   
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#category').change(function() {
            var categoryId = $(this).val();
            if (categoryId) {
                $.ajax({
                    url: '/get-subcategories/' + categoryId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#subCategory').empty();
                        $('#subCategory').append('<option selected>Choose a subcategory</option>');
                        $.each(data, function(key, value) {
                            $('#subCategory').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#subCategory').empty();
                $('#subCategory').append('<option selected>Choose a subcategory</option>');
            }
        });

        var selectedFiles = [];
    
    $("#file-input").on("change", function() {
        var files = $(this)[0].files;
        $("#preview-container").empty(); // Clear the previous previews
        selectedFiles = [];
        
        for (var i = 0; i < files.length; i++) {
            selectedFiles.push(files[i]);
            var reader = new FileReader();
            reader.onload = function(e) {
                var index = selectedFiles.length - 1;
                $("<div class='preview'><img src='" + e.target.result + "'><input type='radio' name='thumbnail' value='" + index + "' required>Thumbnail<button class='delete'>Delete</button></div>").appendTo("#preview-container");
            };
            reader.readAsDataURL(files[i]);
        }
    });

    $("#preview-container").on("click", ".delete", function() {
        var index = $(this).parent().index();
        selectedFiles.splice(index, 1);
        $(this).parent(".preview").remove();
        
        // Re-index the thumbnail radio buttons
        $("#preview-container .preview").each(function(i, elem) {
            $(elem).find("input[name='thumbnail']").val(i);
        });

        $("#file-input").val(""); // Clear input value if needed
    });
    });
</script>


@endsection
