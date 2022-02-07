<div>
    <div class='flex justify-between w-full h-full mb-4 text-center'>
        <div class='flex items-center text-3xl'>
            Edit Song
        </div>
        <div>
            <a class="px-4 py-2 mr-3 text-black rounded bg-turq" href='{{ route('admin.songs') }}'>
                All Songs
            </a>
        </div>
    </div>
    <div class='flex flex-col w-full gap-4 md:flex-row'>
        <div class='w-full md:w-1/2'>
            <div class="flex flex-col w-full gap-4 p-4 bg-white border rounded shadow-sm">
                <div class='w-full'>
                    <p class='text-lg'>
                        Title
                    </p>
                    <input type='text' class='w-full px-4 py-2 bg-white border rounded' placeholder="Enter Song Title" wire:model='songTitle'>
                    @error('songTitle')
                    <div class='font-bold text-bsred'>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class='w-full'>
                    <p class='text-lg'>
                        Slug
                    </p>
                    <input type='text' class='w-full px-4 py-2 bg-white border rounded' placeholder="Article Slug(Fill Title first)" wire:model='songSlug' disabled>
                </div>
                <div class='w-full' wire:ignore>
                    <p class='text-lg'>
                        Description
                    </p>
                    <textarea id='songDescription' wire:model='songDescription'>
                    </textarea>
                </div>
                @error('songDescription')
                <div class='font-bold text-bsred'>
                    {{ $message }}
                </div>
                @enderror
                <div class='w-full'>
                    <p class='text-lg'>
                        SEO Text
                    </p>
                    <textarea class='w-full px-4 py-2 bg-white border rounded' rows='5' placeholder="Enter SEO Description" wire:model='seoText'></textarea>
                    @error('seoText')
                    <div class='font-bold text-bsred'>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class='w-full md:w-1/2'>
            <div class="flex flex-col w-full gap-4 p-4 bg-white border rounded shadow-sm">
                <div class='flex flex-col w-full gap-2'>
                    <p class='text-lg'>
                        Released At
                    </p>
                    <input type='text' class='w-full px-4 py-2 bg-white border rounded' placeholder="Enter Released Date (YYYY-MM-DD)" wire:model='releasedAt'>
                    @error('releasedAt')
                    <div class='font-bold text-bsred'>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class='flex flex-col w-full gap-2'>
                    <p class='text-lg'>
                        Youtube
                    </p>
                    <input type='text' class='w-full px-4 py-2 bg-white border rounded' placeholder="Enter Youtube Tag (5qA1zxuMt34)" wire:model='youtube'>
                    @error('youtube')
                    <div class='font-bold text-bsred'>
                        {{ $message }}
                    </div>
                    @enderror
                    <p class='text-lg'>
                        Noodle
                    </p>
                    <input type='text' class='w-full px-4 py-2 bg-white border rounded' placeholder="Enter Noodle Id (1385)" wire:model='noodle'>
                    @error('noodle')
                    <div class='font-bold text-bsred'>
                        {{ $message }}
                    </div>
                    @enderror
                    <p class='text-lg'>
                        Spotify
                    </p>
                    <input type='text' class='w-full px-4 py-2 bg-white border rounded' placeholder="Enter Spotify Id (3UOubAFfAqyqHSaOeA4Y5h)" wire:model='spotify'>
                    @error('spotify')
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
                    <button class='w-full p-2 font-bold text-white uppercase border rounded-lg border-turq hover:text-black bg-turq hover:border-black' wire:click='publishArticle'>Update</button>
                    <button class='w-full p-2 font-bold uppercase bg-white border rounded-lg text-turq border-turq hover:text-black hover:border-black' wire:click='draftArticle'>Save as Draft</button>
                </div>
            </div>
        </div>
    </div>
    @push('styles')
        <link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">
    @endpush
    @push('scripts')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/p47paciinlfiov1oumn6ftva8g3x4qwt5z2z3258ayqs6lf4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
        selector: 'textarea#songDescription',
        height: 200,
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
                @this.set('songDescription', editor.getContent());
            });
        },
    });
    </script>
    @endpush
</div>
