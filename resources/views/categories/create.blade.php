@include('./link')
        <main>
            <div class="container mx-auto w-full px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
                <div class="w-full max-w-2xl mx-auto bg-white rounded-lg shadow-md p-4 sm:p-6 lg:p-8">
                  
                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-800 mb-6">Add New Category</h1>
            
                    
                    @if ($errors->any())
                        <div class="bg-red-50 border border-red-300 text-red-800 px-4 py-3 rounded-lg mb-6">
                            <p class="font-semibold text-sm mb-2">Please fix the following errors:</p>
                            <ul class="text-xs sm:text-sm space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            
                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
            
                        <div>
                            <label for="name" class="block text-sm sm:text-base font-medium text-gray-700 mb-2">Category Name</label>
                            <input 
                                type="text" 
                                name="name" 
                                id="name"
                                value="{{ old('name') }}"
                                class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required
                            >
                        </div>
            

                        <div>
                            <label for="image_path" class="block text-sm sm:text-base font-medium text-gray-700 mb-2">Category Image</label>
                            <input 
                                type="file" 
                                name="image_path" 
                                id="image_path"
                                class="w-full text-xs sm:text-sm text-gray-500 file:mr-4 file:py-2 sm:file:py-3 file:px-4 sm:file:px-6 file:rounded-md file:border-0 file:text-xs sm:file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition"
                                accept="image/*"
                                required
                            >
                            <p class="mt-2 text-xs text-gray-500">PNG, JPG up to 5MB</p>
                        </div>
            
                        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 pt-4 border-t border-gray-200">
                            <a 
                                href="{{ route('categories.index') }}" 
                                class="w-full sm:w-auto inline-flex items-center justify-center px-4 sm:px-6 py-2 sm:py-3 bg-gray-200 border border-transparent rounded-lg font-semibold text-xs sm:text-sm text-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition"
                            >
                               Back To Categories
                            </a>
                            <button 
                                type="submit" 
                                class="w-full sm:w-auto inline-flex items-center justify-center px-4 sm:px-6 py-2 sm:py-3 bg-blue-600 border border-transparent rounded-lg font-semibold text-xs sm:text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition"
                            >
                                Create Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main> 
    
