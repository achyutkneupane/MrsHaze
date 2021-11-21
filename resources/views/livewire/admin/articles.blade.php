<div class='w-full'>
    <div class='flex justify-between w-full h-full mb-4 text-center'>
        <div class='flex items-center text-3xl'>
            Articles
        </div>
        <div>
            <a class="px-4 py-2 mr-3 text-black rounded bg-turq" href='{{ route('admin.articles.add') }}'>
                + Add Article
            </a>
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
                    <span class="text-black">Category</span>
                </th>
                <th class="px-16 py-2">
                    <span class="text-black">Action</span>
                </th>
            </tr>
        </thead>
        <tbody class="bg-gray-200">
            @foreach ($articles as $article)
                <tr class="text-center bg-white border-4 border-gray-200">
                    <td class="px-16 py-2">
                        <span>{{ $loop->iteration }}</span>
                    </td>
                    <td class="px-16 py-2">
                        <span>{{ $article->title }}</span>
                    </td>
                    <td class="px-16 py-2">
                        <span>{{ $article->slug }}</span>
                    </td>
                    <td class="px-16 py-2">
                        <span>{{ $article->category->title }}</span>
                    </td>
                    <td class="px-16 py-2">
                        <span>Buttons</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
