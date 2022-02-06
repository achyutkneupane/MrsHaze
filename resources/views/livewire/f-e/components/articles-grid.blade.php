<div class="articlesGrid">
    @foreach ($articles as $article)
        <div class='w-full sm:w-1/3 lg:w-1/4'>
            @livewire('f-e.components.article-card', ['article' => $article])
        </div>
    @endforeach
    @push('scripts')
        <script src="https://unpkg.com/magic-grid/dist/magic-grid.min.js"></script>
        <script>
            let magicGrid = new MagicGrid({
                container: ".articlesGrid",
                animate: true,
                gutter: 30,
                static: true,
                useMin: true,
                maxColumns: 3,
            });
            magicGrid.listen();
        </script>
    @endpush
</div>