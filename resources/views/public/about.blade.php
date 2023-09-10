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

    {{-- about us --}}
    <div class="my-4 ">
        <div class="my-8 text-5xl justify-center text-center">
            <h1>About us</h1>
        </div>
        <div class="mx-8 font-light">
            <p class="my-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis lorem nunc, dignissim et nulla ac, cursus
                euismod ipsum. Integer eros lacus, dignissim vel felis non, feugiat luctus velit. Vestibulum vehicula,
                purus posuere tempor commodo, risus enim laoreet nisl, in pulvinar eros odio quis nunc. In neque nulla,
                venenatis rutrum fermentum non, condimentum eget mauris. Donec vitae molestie nunc. Ut imperdiet, mi sit
                amet tincidunt feugiat, nunc ante ultrices turpis, a sollicitudin augue metus bibendum mi. Nulla vel
                libero vel leo ultrices ultricies. Nam ante nisl, ultrices quis pellentesque et, vehicula vitae purus.
                Sed convallis aliquet massa, vitae mollis erat. Etiam vel semper augue. Aenean erat eros, ultricies id
                turpis in, aliquet aliquet augue. Sed posuere quis lorem vitae iaculis.</p>
            <p class="my-6">Maecenas aliquet lectus eget pretium efficitur. Nullam ultricies non lorem vitae iaculis. Sed sed tempor
                mauris. Curabitur consequat cursus nisi ut aliquet. In at eros vitae nibh pellentesque fermentum at nec
                velit. Nulla a placerat sapien, a sollicitudin enim. Quisque neque purus, feugiat vitae eros non,
                laoreet fringilla leo. Praesent neque libero, eleifend non sem sit amet, fringilla imperdiet ex. Proin
                placerat tortor neque.</p>
            <p class="my-6">Maecenas ultrices quam enim, vel vehicula nisi commodo facilisis. Praesent at suscipit risus. Nam velit
                leo, porta vitae rutrum quis, sollicitudin nec quam. Vivamus non tortor ac ex convallis maximus a in
                elit. Phasellus lacinia tellus lectus, interdum tristique orci vulputate nec. Fusce accumsan non ipsum
                vitae aliquam. Nulla tincidunt risus in vehicula vestibulum. Ut eleifend nisi ut ultrices hendrerit.
                Phasellus lacinia erat felis, a ultricies velit tristique ut. Proin gravida ex eu orci commodo mattis.
                Nullam egestas, lectus non convallis dignissim, justo magna tincidunt orci, quis gravida tellus enim id
                eros. Proin ac sapien non elit ultricies aliquet pellentesque commodo ligula. Integer vestibulum massa
                vel velit molestie, vitae volutpat purus fermentum. Nulla vitae erat pellentesque, cursus</p>

        </div>


    </div>

    <!-- Footer container -->
    @include('public.components.footer')

    {{-- Gallery --}}
</body>


{{-- <script type="text/javascript" src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script> --}}

</html>
