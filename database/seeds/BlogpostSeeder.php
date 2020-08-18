<?php

use Illuminate\Database\Seeder;

class BlogpostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogposts')->insert
        ([
            'author_id' => '1',
            'title' => 'Ceci est un premier tire',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Facilisis sed odio morbi quis commodo odio aenean sed. Ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Libero nunc consequat interdum varius sit amet mattis vulputate. Ut lectus arcu bibendum at varius vel pharetra vel. Quis viverra nibh cras pulvinar. Donec et odio pellentesque diam volutpat commodo. Diam sollicitudin tempor id eu nisl nunc mi ipsum faucibus. Vestibulum rhoncus est pellentesque elit ullamcorper dignissim. Amet dictum sit amet justo donec. Urna id volutpat lacus laoreet non.',
        ]);

        DB::table('blogposts')->insert
        ([
            'author_id' => '2',
            'title' => 'Ceci est un second tire',
            'content' => 'Lorem Ipsum is the single greatest threat. We are not - we are not keeping up with other websites. Lorem Ipsum best not make any more threats to your website. It will be met with fire and fury like the world has never seen. Does everybody know that pig named Lorem Ipsum? An ‘extremely credible source’ has called my office and told me that Barack Obama’s placeholder text is a fraud.',
        ]);

        // factory(App\Blogpost::class, 10)->create();
    }
}
