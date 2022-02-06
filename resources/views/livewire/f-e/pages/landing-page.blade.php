<div class='bodyView'>
    @push('meta_tags')
        <title>Mrs. Haze</title>
        <meta name="title" content="Mrs. Haze" />
        <meta name="description"
            content="Mrs. Haze in the house, ya'll! (aka Subani Moktan). Join me as we unravel the mystery of why my brain works at the speed of light: constantly thinking to the point of overthinking—and overthinking overthinking." />
        <meta name="keywords" content="Subani Moktan,Mrs. Haze,Mrs. Haze Writes" />
        <meta property="article:published_time" content="2021-11-23 00:00:00" />
        <meta property="article:section" content="website" />
        <meta property="fb:app_id" content="931301841077172" />
        <meta property="fb:pages" content="333706163397393" />

        <meta property="og:type" content="website" />
        <meta property="og:title" content="Mrs. Haze" />
        <meta property="og:description"
            content="Mrs. Haze in the house, ya'll! (aka Subani Moktan). Join me as we unravel the mystery of why my brain works at the speed of light: constantly thinking to the point of overthinking—and overthinking overthinking." />
        <meta property="og:image" content="{{ asset('assets/cover-page.jpg') }}" />
        <meta property="og:site_name" content="Mrs. Haze" />

        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="Mrs. Haze" />
        <meta name="twitter:description"
            content="Mrs. Haze in the house, ya'll! (aka Subani Moktan). Join me as we unravel the mystery of why my brain works at the speed of light: constantly thinking to the point of overthinking—and overthinking overthinking." />
        <meta name="twitter:image" content="{{ asset('assets/cover-page.jpg') }}" />
    @endpush
    @livewire('f-e.components.landing-home')
    <div class='w-screen px-4 my-40'>
        @livewire('f-e.components.articles-grid',['articles'=>$articles])
    </div>
    @livewire('f-e.components.footer')
</div>
