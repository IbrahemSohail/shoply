<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.bunny.net">
      <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
      @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>File</title>
</head>
<body>
        <form class="flex flex-col place-items-center border-2 p-4" action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" placeholder="Category Name" required>
            <input type="file" name="image" required>
    
        <button class="bg-gray-500 w-16 my-4 text-white rounded-2xl" type="submit">Submit</button>
        {{-- <select name="" id="">
            <option value="product">Product</option>
            <option value="category">Category</option>
        </select> --}}
        </form>
        
    </div>
</body>
</html>