<div class="flex flex-col items-center w-full gap-8 py-8">
    <h3 class="w-1/2 text-3xl text-center uppercase md:w-1/3 lg:w-1/6 h3title">
      More Articles
    </h3>
    <div class="flex flex-col justify-center w-full gap-4 md:flex-row md:flex-wrap">
      <div class="grid w-full px-8 md:px-0">
        @livewire('f-e.components.articles-grid', ['articles' => $others])
      </div>
    </div>
</div>