@include('./link')
        <main>
            <div class="container mx-auto px-4 py-8">
                <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
                  
                    <h1 class="text-3xl font-bold text-gray-800 mb-6">Add New Category</h1>
            
                    
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            
                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
            
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                            <input 
                                type="text" 
                                name="name" 
                                id="name"
                                value="{{ old('name') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                required
                            >
                        </div>
            

                        <div>
                            <label for="image_path" class="block text-sm font-medium text-gray-700">Category Image</label>
                            <input 
                                type="file" 
                                name="image_path" 
                                id="image_path"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                accept="image/*"
                                required
                            >
                        </div>
            
                        <div class="flex justify-end space-x-4">
                            <a 
                                href="{{ route('categories.index') }}" 
                                class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                            >
                               Back To Categories
                            </a>
                            <button 
                                type="submit" 
                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                            >
                                Create Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main> 
    
