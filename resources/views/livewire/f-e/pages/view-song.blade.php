<div class="bodyView">
    <Head>
        <title>{{ $song->title }} || Subani Moktan</title>
        <meta name="title" content="{{ $song->title }} || Subani Moktan" />
        <meta name="description" content={{ $song->seo_text }} />
        <meta name="keywords" content="Subani Moktan,Mrs. Haze,Mrs. Haze Writes,Songs,{{ $song->title }}" />
        <meta property="article:published_time" content="{{ $song->released_at }}" />
        <meta property="article:section" content="article" />

        <meta property="og:type" content="article" />
        <meta property="og:title" content="{{ $song->title }} || Subani Moktan" />
        <meta property="og:description" content={{ $song->seo_text }} />
        <meta property="og:image" content={{ $song->cover }} />

        <meta name="twitter:title" content="{{ $song->title }} || Subani Moktan" />
        <meta name="twitter:description" content={{ $song->seo_text }} />
        <meta name="twitter:image" content={{ $song->cover }} />
    </Head>
    <div class="flex flex-col w-screen h-screen">
        @livewire('f-e.components.navbar')
        <div class="flex flex-col-reverse gap-4 p-4 divide-x-8 divide-black md:overflow-y-scroll md:flex-row">
            <div
                class="relative flex flex-col w-full h-full gap-2 bg-white shadow md:w-1/3 md:overflow-scroll rounded-xl shadow-black">
                <div>
                    <a class="flex w-full p-2 bg-gray-200 border-black border-x-8"
                        href={{ route('view-song', $song->slug) }}>
                        <div class="w-1/4 p-2">
                            <img src="{{ $song->medium_cover }}" alt="{{ $song->title }} - Subani Moktan" />
                        </div>
                        <div class="flex flex-col justify-center w-3/4 px-2">
                            <div class="text-lg font-extrabold md:text-xl">{{ $song->title }}</div>
                            <div class="text-sm text-gray-700">{{ $song->seo_text }}</div>
                            <div class="text-gray-800">
                                <span class="font-bold">Released</span>:
                                {{ \Carbon\Carbon::parse($song->released_at)->format('d M Y') }}
                            </div>
                        </div>
                    </a>
                </div>
                <div>
                    @foreach ($others as $other)
                        <a class="flex w-full p-2 bg-white hover:bg-gray-200"
                            href="{{ route('view-song', $other->slug) }}">
                            <div class="w-1/4 p-2">
                                <img src="{{ $other->medium_cover }}" alt="{{ $other->title }} - Subani Moktan" />
                            </div>
                            <div class="flex flex-col justify-center w-3/4 px-2">
                                <div class="text-lg font-extrabold text-black md:text-xl">
                                    {{ $other->title }}
                                </div>
                                <div class="text-sm text-gray-700">
                                    {{ $other->seo_text }}
                                </div>
                                <div class="text-gray-800">
                                    <span class="font-bold">Released</span>:
                                    {{ \Carbon\Carbon::parse($other->released_at)->format('d M Y') }}
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div
                class="flex flex-col justify-center w-full h-full gap-2 bg-white shadow md:overflow-scroll md:w-2/3 rounded-xl shadow-black md:shadow-none">
                <div class="flex flex-col items-center h-full gap-2 px-2 pt-8">
                    <iframe src="https://www.youtube.com/embed/{{ $song->youtube }}?autoplay=1" height="100%" class="w-full h-72 md:h-full md:w-4/5" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                    <div class="flex flex-col items-center gap-2 py-5">
                        <div class="text-3xl font-bold text-center uppercase md:text-5xl text-turq">{{ $song->title }}</div>
                        <div class="flex justify-center w-full gap-2 text-gray-600 md:w-1/2">
                            <span>Released <b>{{ \Carbon\Carbon::parse($song->released_at)->diffForHumans() }}</b></span>
                            @if(!empty($song->noodle))
                            <span class='font-bold'> | </span>
                            <span><a href='https://noodlerex.com.np/songs/{{ $song->noodle }}' class='text-red-700' target="_blank">Buy at <b>Noodle</b></a></span>
                            @endif
                        </div>
                        <div
                            class="w-3/4 overflow-y-scroll text-center text-gray-800 lg:h-40 first-letter:text-4xl first-letter:md:text-7xl first-letter:float-left first-letter:text-black first-letter:font-bold">
                            {!! $song->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
