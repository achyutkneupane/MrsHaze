<div class="hidden border-r border-black md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64">
        <div class="flex flex-col flex-grow pt-5 overflow-y-auto border-r bg-turq ">
            <div class="flex flex-col items-center flex-shrink-0 px-4">
                <a href="/" class="px-8 text-left focus:outline-none">
                    <h2
                        class="block p-2 text-5xl font-medium tracking-tighter text-black transition duration-500 ease-in-out transform cursor-pointer logoText">
                            Mrs. Haze
                        </h2>
                </a>
                <button class="hidden rounded-lg focus:outline-none focus:shadow-outline">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="flex flex-col flex-grow px-4 mt-5">
                <nav class="flex-1 space-y-1 bg-turq">
                    <ul>
                        <li>
                            <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-base transition duration-500 ease-in-out transform rounded-lg focus:shadow-outline {{ request()->routeIs('admin.home') ? 'bg-gray-800 text-white' : 'text-black hover:bg-white' }}"
                                white="" 70="" href="{{ route('admin.home') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span class="ml-4"> Home</span>
                            </a>
                        </li>
                        <li>
                            <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-base transition duration-500 ease-in-out transform rounded-lg focus:shadow-outline {{ request()->routeIs('admin.articles') ? 'bg-gray-800 text-white' : 'text-black hover:bg-white' }}"
                                white="" 70="" href="{{ route('admin.articles') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                <span class="ml-4"> Articles</span>
                            </a>
                        </li>
                        <li>
                            <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-base transition duration-500 ease-in-out transform rounded-lg focus:shadow-outline {{ request()->routeIs('admin.categories') ? 'bg-gray-800 text-white' : 'text-black hover:bg-white' }}"
                                white="" 70="" href="{{ route('admin.categories') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                                <span class="ml-4"> Categories</span>
                            </a>
                        </li>
                        <li>
                            <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-base transition duration-500 ease-in-out transform rounded-lg focus:shadow-outline {{ request()->routeIs('admin.tags') ? 'bg-gray-800 text-white' : 'text-black hover:bg-white' }}"
                                white="" 70="" href="{{ route('admin.tags') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                                <span class="ml-4"> Tags</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
