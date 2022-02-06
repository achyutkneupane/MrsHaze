<div class='w-screen h-screen bodyView'>
    <div class='w-full h-full bg-center bg-no-repeat bg-cover lg:bg-left lg:bg-contain bgImage'>
        <div class='flex justify-end w-full h-full bg-opacity-60 bg-turq lg:bg-opacity-0'>
            <div class='flex flex-col items-center justify-center w-full gap-4 px-4 text-black xl:w-1/2 lg:w-2/5 xl:mx-16 lg:mx-2'>
                <div class='flex flex-col w-2/3 gap-2'>
                    <label for='email' class='text-lg font-bold uppercase'>Email Address</label>
                    <input type='email' wire:model='email' placeholder="Enter Email address" class='p-2 border border-black rounded-lg'>
                    @error('email')
                        <div class='font-bold text-red-700'>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class='flex flex-col w-2/3 gap-2'>
                    <label for='password' class='text-lg font-bold uppercase'>Password</label>
                    <input type='password' wire:model='password' placeholder="Enter Password" class='p-2 border border-black rounded-lg'>
                    @error('password')
                        <div class='font-bold text-red-700'>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class='flex flex-col w-1/3 gap-2'>
                    <button class='px-2 py-3 text-white uppercase bg-black rounded-lg' wire:click='login'>
                        Login
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .bgImage {
        background-image: url("{{ asset('images/Subani-Moktan-mrshaze.png') }}")
    }
</style>
@endpush