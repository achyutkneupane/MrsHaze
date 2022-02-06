<div class="flex flex-col items-center w-full p-4 bg-gray-100 lg:p-8 rounded-xl">
    <img class="object-cover object-center w-full mb-8 h-72 lg:h-48 rounded-xl" loading="lazy"
        src="{{ $article->medium_cover }}" alt="{{ $article->title }} - Mrs. Haze"
        title="{{ $article->title }} - Mrs. Haze" />
    <a class="mx-auto mb-2 text-2xl font-semibold leading-none tracking-tighter text-center text-black title-font"
        href='{{ route('view-article', $article->slug) }}' title='{{ $article->title }} - Mrs. Haze'
        alt='{{ $article->title }} - Mrs. Haze'>
        {{ $article->title }}
    </a>
    <div class="flex flex-row justify-center gap-2 my-4 font-bold text-turq">
        <div>
            <a>{{ $article->category->title }}</a>
        </div>
        <div class="text-black"> | </div>
        <div>{{ \Carbon\Carbon::parse($article->published_at)->diffForHumans() }}</div>
    </div>
    <p class="mx-auto text-base font-medium leading-relaxed text-justify text-gray-500">
        {{ \Illuminate\Support\Str::words(strip_tags($article->content), 50, '...') }}
    </p>
    <a class="inline-flex items-center mt-4 font-semibold text-blue-600 lg:mb-0 hover:text-black "
        href='{{ route('view-article', $article->slug) }}' title='{{ $article->title }} - Mrs. Haze'
        alt='{{ $article->title }} - Mrs. Haze'>
        Read More »
    </a>
</div>
