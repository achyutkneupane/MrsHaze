<div class='w-full'>
    <div class='flex justify-between w-full h-full mb-4 text-center'>
        <div class='flex items-center text-3xl'>
            Songs
        </div>
        <div>
            <a class="px-4 py-2 mr-3 text-black rounded bg-turq" href='{{ route('admin.songs.add') }}'>
                + Add Song
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
                    <span class="text-black">Released</span>
                </th>
                <th class="px-16 py-2">
                    <span class="text-black">Action</span>
                </th>
            </tr>
        </thead>
        <tbody class="bg-gray-200">
            @foreach ($songs as $song)
                <tr class="text-center bg-white border-4 border-gray-200">
                    <td class="px-16 py-2">
                        <span>{{ $loop->iteration }}</span>
                    </td>
                    <td class="px-16 py-2">
                        <span>{{ $song->title }}</span>
                    </td>
                    <td class="px-16 py-2">
                        <span>{{ $song->slug }}</span>
                    </td>
                    <td class="px-16 py-2">
                        <span>{{ $song->released_at }}</span>
                    </td>
                    <td class="px-16 py-2">
                        <div class='flex justify-center gap-4'>
                            <a class='px-3 py-2 text-black bg-yellow-400 border rounded' href='{{ route('admin.songs.edit',$song->id) }}'>
                                Edit
                            </a>
                            <a class='px-3 py-2 text-black border rounded bg-turq' href='/song/{{ $song->slug }}' target="_blank">
                                View Song
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
