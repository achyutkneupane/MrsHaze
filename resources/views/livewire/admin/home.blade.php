<div class='flex flex-col w-full gap-4 md:flex-row'>
    <div class='flex items-center justify-between w-1/3 p-4 px-4 border border-black rounded-xl bg-turq'>
        <div class='flex flex-col'>
            <div class='font-bold text-gray-600 uppercase font-xs'>
                Articles
            </div>
            <div class='text-5xl font-bold text-white'>
                {{ App\Models\Article::count() }}
            </div>
            <div>
                <a href='{{ route('admin.articles') }}' class='text-black'>
                    View All Articles
                </a>
            </div>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
        </div>
    </div>
    <div class='flex items-center justify-between w-1/3 p-4 px-4 border border-black rounded-xl bg-turq'>
        <div class='flex flex-col'>
            <div class='font-bold text-gray-600 uppercase font-xs'>
                Categories
            </div>
            <div class='text-5xl font-bold text-white'>
                {{ App\Models\Category::count() }}
            </div>
            <div>
                <a href='{{ route('admin.categories') }}' class='text-black'>
                    View All Categories
                </a>
            </div>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
            </svg>
        </div>
    </div>
    <div class='flex items-center justify-between w-1/3 p-4 px-4 border border-black rounded-xl bg-turq'>
        <div class='flex flex-col'>
            <div class='font-bold text-gray-600 uppercase font-xs'>
                Tags
            </div>
            <div class='text-5xl font-bold text-white'>
                {{ App\Models\Tag::count() }}
            </div>
            <div>
                <a href='{{ route('admin.tags') }}' class='text-black'>
                    View All Tags
                </a>
            </div>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
            </svg>
        </div>
    </div>
</div>
