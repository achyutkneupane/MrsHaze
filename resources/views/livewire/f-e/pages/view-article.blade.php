<div class="bodyView">
    @push('meta_tags')
        <title>{{ $post->title }} - Mrs. Haze</title>
        <meta name="title" content="{{ $post->title }} - Mrs. Haze" />
        <meta name="description" content="{{ $post->description }}" />
        <meta name="keywords" content="Subani Moktan,Mrs. Haze,Mrs. Haze Writes,{{ $post->title }}" />
        <meta property="article:published_time" content="{{ $post->published_at }}" />
        <meta property="article:section" content="article" />

        <meta property="og:type" content="article" />
        <meta property="og:title" content="{{ $post->title }} - Mrs. Haze" />
        <meta property="og:description" content="{{ $post->description }}" />
        <meta property="og:image" content="{{ $post->cover }}" />
        <meta property="og:site_name" content="Mrs. Haze" />

        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="{{ $post->title }} - Mrs. Haze" />
        <meta name="twitter:description" content="{{ $post->description }}" />
        <meta name="twitter:image" content="{{ asset('assets/cover-page.jpg') }}" />
    @endpush
    @livewire('f-e.components.navbar')
    <div>
        <div class="flex flex-col gap-4 py-12">
            <div class="flex flex-row justify-center px-8">
                <img src="{{ $post->big_cover }}" alt="Chocolate" class="border-4 border-gray-100 " />
            </div>
            <article
                class="flex flex-col gap-4 p-8 mx-8 text-justify bg-white shadow text-gray-750 sm:mx-16 md:mx-24 lg:mx-36 rounded-xl shadow-black"
                id="article">
                <div class="justify-center md:flex">
                    <div class="flex flex-col items-center justify-center w-full py-4 mx-4 md:float-left">
                        <div class="text-4xl font-bold text-center uppercase text-turq">
                            {{ $post->title }}
                        </div>
                        <div class="text-lg text-gray-600">
                            Written <b>{{ \Carbon\Carbon::parse($post->published_at)->diffForHumans() }}</b>
                        </div>
                    </div>
                    <div
                        class="my-auto first-letter:text-7xl first-letter:float-left first-letter:pr-4 first-letter:text-black first-letter:font-bold">
                        {!! $this->content[0] !!}
                    </div>
                </div>
                @foreach($this->content as $section)
                @if($section != $this->content[0])
                <div class="text-gray-600">
                    {!! $section !!}
                </div>
                @endif
                @endforeach
            </article>
        </div>
    </div>
    @livewire('f-e.components.other-articles', ['slug' => $post->slug])
    @livewire('f-e.components.footer')
</div>
