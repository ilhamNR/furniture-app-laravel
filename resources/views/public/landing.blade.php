<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>

<body>
    <!-- Main navigation container -->
    @include('public.components.navbar')
    <header>

        <!-- Hero section with background image, heading, subheading and button -->
        <div class="relative overflow-hidden bg-cover bg-no-repeat"
            style="
            background-position: 50%;
            background-image: url('https://tecdn.b-cdn.net/img/new/slides/146.webp');
            height: 350px;
          ">
            <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed"
                style="background-color: rgba(0, 0, 0, 0)">

            </div>
        </div>
    </header>
    <div
        class=" mx-8 my-8 text-center rounded-lg bg-white md:p-8 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
        <h1 class="mb-2 text-xl font-medium leading-tight text-neutral-800">
            Our Products
        </h1>
        <div class="flex flex-row max-md:flex-col justify-center">
            <div
                class="mx-8 max-md:my-4 block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
                <div class="relative overflow-hidden bg-cover bg-no-repeat" data-te-ripple-init
                    data-te-ripple-color="light">
                    <img class="rounded-t-lg" src="https://tecdn.b-cdn.net/img/new/standard/nature/186.jpg"
                        alt="" />
                    <a href="#!">
                        <div
                            class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-[hsla(0,0%,98%,0.15)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100">
                        </div>
                    </a>
                </div>
                <div class="p-6">
                    <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800">
                        Product 1
                    </h5>

                </div>
            </div>
            <div
                class="mx-8 max-md:my-4 block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
                <div class="relative overflow-hidden bg-cover bg-no-repeat" data-te-ripple-init
                    data-te-ripple-color="light">
                    <img class="rounded-t-lg" src="https://tecdn.b-cdn.net/img/new/standard/nature/186.jpg"
                        alt="" />
                    <a href="#!">
                        <div
                            class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-[hsla(0,0%,98%,0.15)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100">
                        </div>
                    </a>
                </div>
                <div class="p-6">
                    <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800">
                        Product 2
                    </h5>

                </div>
            </div>
            <div
                class="mx-8 max-md:my-4 block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
                <div class="relative overflow-hidden bg-cover bg-no-repeat" data-te-ripple-init
                    data-te-ripple-color="light">
                    <img class="rounded-t-lg" src="https://tecdn.b-cdn.net/img/new/standard/nature/186.jpg"
                        alt="" />
                    <a href="#!">
                        <div
                            class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-[hsla(0,0%,98%,0.15)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100">
                        </div>
                    </a>
                </div>
                <div class="p-6">
                    <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800">
                        Product 3
                    </h5>

                </div>
            </div>
        </div>
    </div>

    <!-- Footer container -->
    @include('public.components.footer')

    {{-- Gallery --}}
</body>


{{-- <script type="text/javascript" src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script> --}}

</html>
