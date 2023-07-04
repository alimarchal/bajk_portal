<x-app-layout>
    @push('custom-scripts')
        <script src="https://cdn.tiny.cloud/1/izbyerk8x92uls8z2ulnezm5uaudhf41lw0lebop5ba724o5/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Create Noticeboard') }}
        </h2>
        <div class="flex justify-center items-center float-right">
            <a href="{{route('noticeBoard.index')}}" class="flex items-center px-4 py-2 text-gray-600 bg-white border rounded-lg focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-gray-200 dark:border-gray-200  dark:hover:bg-gray-700 ml-2" title="Members List">
                <span class="hidden md:inline-block ml-2">Back</span>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <x-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="w-full mx-auto" action="{{route('noticeBoard.update', $noticeBoard->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="category_id" value="10">
                        <div class="mb-4">
                            <label for="title" class="block mb-1">Title</label>
                            <input type="text"
                                   id="title"
                                   name="title"
                                   value="{{ $noticeBoard->title }}"
                                   class="w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block mb-1">Description</label>
                            <textarea id="description"
                                      name="description"
                                      class="w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ $noticeBoard->description }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="file" class="block mb-1">Document <span class="text-red-500"><a href="{{ Storage::url($noticeBoard->file) }}">OLD FILE</a></span></label>
                            <input type="file"
                                   id="file"
                                   name="file"
                                   class="w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                    class="max-w-lg py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white rounded-md focus:outline-none">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @push('modals')
        <script>
            tinymce.init({
                selector: 'textarea',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            });
        </script>
    @endpush
</x-app-layout>
