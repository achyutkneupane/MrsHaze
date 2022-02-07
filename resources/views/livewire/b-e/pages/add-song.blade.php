<div>
    <div class='flex justify-between w-full h-full mb-4 text-center'>
        <div class='flex items-center text-3xl'>
            Add Song
        </div>
        <div>
            <a class="px-4 py-2 mr-3 text-black rounded bg-turq" href='{{ route('admin.articles') }}'>
                All Songs
            </a>
        </div>
    </div>
    <div class='flex flex-col w-full gap-4 md:flex-row'>
        <div class='w-full md:w-2/3'>
            <div class="flex flex-col w-full gap-4 p-4 bg-white border rounded shadow-sm">
                <div class='w-full'>
                    <p class='text-lg'>
                        Title
                    </p>
                    <input type='text' class='w-full px-4 py-2 bg-white border rounded' placeholder="Enter Article Title" wire:model='articleTitle'>
                    @error('articleTitle')
                    <div class='font-bold text-bsred'>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class='w-full' wire:ignore>
                    <textarea id='articleContent' wire:model='articleContent'>
                    </textarea>
                </div>
                @error('articleContent')
                <div class='font-bold text-bsred'>
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class='w-full md:w-1/3'>
            <div class="flex flex-col w-full gap-4 p-4 bg-white border rounded shadow-sm">
                <div class='w-full'>
                    <p class='text-lg'>
                        Slug
                    </p>
                    <input type='text' class='w-full px-4 py-2 bg-white border rounded' placeholder="Article Slug(Fill Title first)" wire:model='articleSlug' disabled>
                </div>
                <div class='w-full' wire:ignore>
                    <p class='text-lg'>
                        Tags
                    </p>
                    <div
                        x-cloak
                        x-data="{
                            tagify: []
                        }"

                        class="w-full"

                        x-init="
                            tagify = new Tagify($refs['tag-input'], {
                                whitelist: {{ $tags }},
                                texts: {
                                    duplicate: 'Duplicates are not allowed'
                                  }
                            });
                            tagify.on('change', onChange)
                            function onChange( e ){
                                @this.set('articleTags', e.detail.value);
                            }
                        "

                        >
                        <input x-ref="tag-input" placeholder="Add tags...">
                    </div>
                </div>
                @error('articleTags')
                <div class='font-bold text-bsred'>
                    {{ $message }}
                </div>
                @enderror
                <div class='w-full'>
                    <p class='text-lg'>
                        SEO Description
                    </p>
                    <textarea class='w-full px-4 py-2 bg-white border rounded' rows='5' placeholder="Enter SEO Description" wire:model='seoDescription'></textarea>
                    @error('seoDescription')
                    <div class='font-bold text-bsred'>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class='w-full'>
                    <p class='text-lg'>
                        Category
                    </p>
                    <select class='w-full px-4 py-2 bg-white border rounded' wire:model='category'>
                        <option value='' disabled selected>Select a category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <div class='font-bold text-bsred'>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class='w-full'>
                    <div class='w-full' wire:ignore>
                        <p class='text-lg'>
                            Featured Image
                        </p>
                        <div
                            class=""
                            x-data="{
                                pond: null
                            }"
    
                            x-init="
                                FilePond.setOptions({
                                    acceptedFileTypes:
                                    [
                                        'image/png', 'image/jpeg'
                                    ],
                                    allowMultiple: false,
                                    maxFileSize: '4MB'
                                });
                                const filepond = FilePond.create(
                                    $refs.filepond
                                );
                                pond = filepond;
                                pond.setOptions({
                                    server: {
                                        process:(fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                            console.log(file.name);
                                            @this.upload('featuredImage', file, load, error, progress);
                                        },
                                    }
                                });
                            "
    
                        >
                            <input type="file" x-ref="filepond" wire:model='featuredImage'>
                        </div>
                    </div>
                    @if($featuredImage)
                        <img src='{{ $featuredImage->temporaryUrl() }}' />
                    @endif
                    @error('featuredImage')
                        <div class='font-bold text-bsred'>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="flex flex-col w-full gap-2">
                    <button class='w-full p-2 font-bold text-white uppercase border rounded-lg border-turq hover:text-black bg-turq hover:border-black' wire:click='publishArticle'>Publish</button>
                    <button class='w-full p-2 font-bold uppercase bg-white border rounded-lg text-turq border-turq hover:text-black hover:border-black' wire:click='draftArticle'>Save as Draft</button>
                </div>
            </div>
        </div>
    </div>
    @push('styles')
        <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
        <link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">
    @endpush
    @push('scripts')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/p47paciinlfiov1oumn6ftva8g3x4qwt5z2z3258ayqs6lf4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
        selector: 'textarea#articleContent',
        height: 600,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
        'bold italic | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist | blockquote image media ',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
        setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });
            editor.on('change', function (e) {
                @this.set('articleContent', editor.getContent());
            });
        },
    });
    </script>
    @endpush
</div>
