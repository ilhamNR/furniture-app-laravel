<div class="flex flex-wrap flex-none justify-center flex-row max-md:flex-col mx-8 my-12">
    @foreach ($products as $product)
    <div wire:key="{{ $product->id }}" class="basis-1/4 mx-8 my-6">
        <div
            class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
            <div class="relative overflow-hidden bg-cover bg-no-repeat h-80 w-full flex items-center" data-te-ripple-init
            data-te-ripple-color="light">
            <!-- Lazy-loaded image -->
            <img loading="lazy" class="rounded-t-lg" src='{{url('storage/product_img/' . $product->thumbnailImage->file_name)}}'
                alt="" />
            <noscript>
                <!-- Show image if JavaScript is disabled -->
                <img src='{{url('storage/product_img/' . $product->thumbnailImage->file_name)}}' alt="" class="rounded-t-lg" />
            </noscript>
            <a href="#!">
                <div
                    class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-[hsla(0,0%,98%,0.15)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100">
                </div>
            </a>
        </div>
            <div class="p-6">
                @if ($product->is_available === 1)
                    <span
                        class="inline-block whitespace-nowrap rounded-full bg-primary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-primary-700">
                        In Stock
                    </span>
                @else
                    <span
                        class="inline-block whitespace-nowrap rounded-full bg-danger-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-danger-700">
                        Out Of Stock
                    </span>
                @endif
                <h5 class="my-2 text-xl font-medium leading-tight text-neutral-800">
                    {{ $product->name }}
                </h5>
                <p class="mb-4 text-base text-neutral-600">
                    IDR{{ number_format($product->price, 2, ',', '.') }}
                </p>
                <button wire:click="" type="button"
                    class="w-full inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                    data-te-ripple-init data-te-toggle="modal" data-te-target="#exampleModalXl"
                    data-te-ripple-init data-te-ripple-color="light">
                    Details
                </button>
            </div>
        </div>
    </div>
@endforeach
</div>
