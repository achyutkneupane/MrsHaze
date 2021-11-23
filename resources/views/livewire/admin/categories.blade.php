<div class='w-full'>
    <div class='flex justify-between w-full h-full mb-4 text-center'>
        <div class='flex items-center text-3xl'>
            Categories
        </div>
        <div>
            <button type="button" onclick="openModal('addCategoryModal')" class="px-4 py-2 mr-3 text-black rounded bg-turq">+ Add Category</button>
        </div>
    </div>
    <table class="min-w-full table-auto">
        <thead class="justify-between">
            <tr class="bg-turq">
                <th class="px-16 py-2">
                    <span class="text-black">#</span>
                </th>
                <th class="px-16 py-2">
                    <span class="text-black">Title</span>
                </th>
                <th class="px-16 py-2">
                    <span class="text-black">Slug</span>
                </th>
                <th class="px-16 py-2">
                    <span class="text-black">Articles</span>
                </th>
                <th class="px-16 py-2">
                    <span class="text-black">Action</span>
                </th>
            </tr>
        </thead>
        <tbody class="bg-gray-200">
            @foreach ($categories as $category)
                <tr class="text-center bg-white border-4 border-gray-200">
                    <td class="px-16 py-2">
                        <span>{{ $loop->iteration }}</span>
                    </td>
                    <td class="px-16 py-2">
                        <span>{{ $category->title }}</span>
                    </td>
                    <td class="px-16 py-2">
                        <span>{{ $category->slug }}</span>
                    </td>
                    <td class="px-16 py-2">
                        <span>{{ $category->articles->count() }}</span>
                    </td>
                    <td class="px-16 py-2">
                        <span>Buttons</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <dialog id="addCategoryModal" class="relative z-0 w-screen h-screen bg-transparent" wire:ignore>
        <div class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full transition-opacity duration-300 bg-gray-900 bg-opacity-50 opacity-0 p-7">
            <div class="relative flex w-1/2 bg-white rounded-lg">
                <div class="flex flex-col items-start w-full">
                    <div class="flex items-center w-full p-7">
                        <div class="text-lg font-bold text-gray-900">Add Category</div>
                        <svg onclick="modalClose('mymodaladdCategoryModalcentered')" class="w-5 h-5 ml-auto text-gray-700 cursor-pointer fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                        </svg>
                    </div>
                    <div class="flex flex-col w-full gap-4 overflow-x-hidden overflow-y-auto px-7" style="max-height: 40vh;">
                        <div class='w-full'>
                            <p class='text-lg'>
                                Title
                            </p>
                            <input type='text' class='w-full px-4 py-2 bg-white border rounded' placeholder="Enter Category Title" wire:model='categoryTitle'>
                        </div>
                        <div class='w-full'>
                            <p class='text-lg'>
                                Slug
                            </p>
                            <input type='text' class='w-full px-4 py-2 bg-white border rounded' placeholder="Category Slug" wire:model='categorySlug' disabled>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-end w-full p-7">
                        <button type="button" class="px-4 py-2 mr-3 font-bold text-white border-black rounded bg-turq" wire:click='addCategory'>
                            Add
                        </button>
                        <button type="button" onclick="modalClose('addCategoryModal')" class="px-4 py-2 font-semibold bg-transparent border rounded text-turq border-turq">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </dialog>
    @push('scripts')
        <script>
            window.addEventListener('closeModal', event=> {
                modalClose('addCategoryModal');
            })
            function openModal(key) {
                document.getElementById(key).showModal(); 
                document.body.setAttribute('style', 'overflow: hidden;'); 
                document.getElementById(key).children[0].scrollTop = 0; 
                document.getElementById(key).children[0].classList.remove('opacity-0'); 
                document.getElementById(key).children[0].classList.add('opacity-100')
            }
        
            function modalClose(key) {
                document.getElementById(key).children[0].classList.remove('opacity-100');
                document.getElementById(key).children[0].classList.add('opacity-0');
                setTimeout(function () {
                    document.getElementById(key).close();
                    document.body.removeAttribute('style');
                }, 100);
            }
        </script>
    @endpush
</div>
