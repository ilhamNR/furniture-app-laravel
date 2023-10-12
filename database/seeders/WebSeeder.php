<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\WebSetting;

class WebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        // landing page

        // header picture
        DB::table('web_settings')->insert([
            'name' => 'pictureheader_img',
            'value' => ''
        ]);
        DB::table('web_settings')->insert([
            'name' => 'pictureheader_title',
            'value' => ''
        ]);

        // picture 1
        DB::table('web_settings')->insert([
            'name' => 'picture1_img',
            'value' => ''
        ]);
        DB::table('web_settings')->insert([
            'name' => 'picture1_title',
            'value' => ''
        ]);

        // picture 2
        DB::table('web_settings')->insert([
            'name' => 'picture2_img',
            'value' => ''
        ]);
        DB::table('web_settings')->insert([
            'name' => 'picture2_title',
            'value' => ''
        ]);

        // picture 3
        DB::table('web_settings')->insert([
            'name' => 'picture3_img',
            'value' => ''
        ]);
        DB::table('web_settings')->insert([
            'name' => 'picture3_title',
            'value' => ''
        ]);
        //about us
        DB::table('web_settings')->insert([
            'name' => 'about-us',
            'value' => '<p class="my-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis lorem nunc, dignissim et nulla ac, cursus
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

',
        ]);
        DB::commit();
    }
}
