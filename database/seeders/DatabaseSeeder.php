<?php

namespace Database\Seeders;

use App\Models\Category;
use \App\Models\User;
use \App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name'=> 'Personal',
            'slug' => 'personal'
        ]);

        $hobby = Category::create([
            'name'=> 'Hobby',
            'slug' => 'hobby'
        ]);

        $work = Category::create([
            'name'=> 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas euismod dignissim libero, eu tristique nibh tempor volutpat. Ut blandit vehicula neque, et blandit ipsum. Fusce urna nisi, venenatis eget feugiat quis, sollicitudin non ligula. Donec luctus non elit eu dictum. Morbi gravida, justo eget gravida convallis, quam arcu elementum lorem,',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas euismod dignissim libero, eu tristique nibh tempor volutpat. Ut blandit vehicula neque, et blandit ipsum. Fusce urna nisi, venenatis eget feugiat quis, sollicitudin non ligula. Donec luctus non elit eu dictum. Morbi gravida, justo eget gravida convallis, quam arcu elementum lorem, in condimentum ligula leo vel odio. Vivamus nec pulvinar justo. Nam a tellus mauris. Curabitur non urna a mi ornare accumsan a a leo. Morbi nunc augue, porttitor sed scelerisque vel, facilisis euismod mauris. Duis accumsan nisi ac justo aliquam ultricies. In lobortis dui ligula, at feugiat orci ullamcorper vitae. In hac habitasse platea dictumst. Sed imperdiet libero ex, et luctus sem porttitor ac. '
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'title' => 'My Personal Post',
            'slug' => 'my-personal-post',
            'excerpt' => 'Curabitur diam tellus, lacinia ac nulla vel, consequat dapibus mauris. Curabitur eget risus lectus. Suspendisse aliquam scelerisque justo non fringilla. Praesent vitae venenatis risus, at tempor augue. Curabitur faucibus sodales mi. Donec tempor aliquam urna tempus hendrerit.',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas euismod dignissim libero, eu tristique nibh tempor volutpat. Ut blandit vehicula neque, et blandit ipsum. Fusce urna nisi, venenatis eget feugiat quis, sollicitudin non ligula. Donec luctus non elit eu dictum. Morbi gravida, justo eget gravida convallis, quam arcu elementum lorem, in condimentum ligula leo vel odio. Vivamus nec pulvinar justo. Nam a tellus mauris. Curabitur non urna a mi ornare accumsan a a leo. Morbi nunc augue, porttitor sed scelerisque vel, facilisis euismod mauris. Duis accumsan nisi ac justo aliquam ultricies. In lobortis dui ligula, at feugiat orci ullamcorper vitae. In hac habitasse platea dictumst. Sed imperdiet libero ex, et luctus sem porttitor ac. '
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $hobby->id,
            'title' => 'My Hobby Post',
            'slug' => 'my-hobby-post',
            'excerpt' => 'Morbi sed ultrices lacus. Nullam eu arcu a arcu rutrum scelerisque bibendum eget sem. Donec aliquam est blandit metus aliquam scelerisque at eleifend orci. Nulla ultrices dignissim ex, vel consequat velit pellentesque ac. Suspendisse elementum ut tortor aliquet feugiat. Praesent in tristique arcu, sit amet fermentum est.',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas euismod dignissim libero, eu tristique nibh tempor volutpat. Ut blandit vehicula neque, et blandit ipsum. Fusce urna nisi, venenatis eget feugiat quis, sollicitudin non ligula. Donec luctus non elit eu dictum. Morbi gravida, justo eget gravida convallis, quam arcu elementum lorem, in condimentum ligula leo vel odio. Vivamus nec pulvinar justo. Nam a tellus mauris. Curabitur non urna a mi ornare accumsan a a leo. Morbi nunc augue, porttitor sed scelerisque vel, facilisis euismod mauris. Duis accumsan nisi ac justo aliquam ultricies. In lobortis dui ligula, at feugiat orci ullamcorper vitae. In hac habitasse platea dictumst. Sed imperdiet libero ex, et luctus sem porttitor ac. '
        ]);
    }
}
