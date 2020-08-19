<?php

use App\Post;
use App\Tag;
use App\Category;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author1= User::create([
            'name' => 'saber muthanna',
            'email'=>'sabermuthanna@gmail',
            'password'=>Hash::make('password')
        ]);
        $author2 = User::create([
            'name' => 'yousf muthanna',
            'email' => 'yousf@gmail.com',
            'password' => Hash::make('password')
        ]);
        $author3 = User::create([
            'name' => 'osam  muthanna',
            'email' => 'osam@gmail.com',
            'password' => Hash::make('password')
        ]);
        $category1 = Category::create([
            'name' => 'News'
        ]);
        $category2 = Category::create([
            'name' => 'Marketing'
        ]);
        $category3 = Category::create([
            'name' => 'Partnership'
        ]);
        $post1 =  Post::create([
            'title' => 'We relocated our office to a new designed garage.',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry1.',
            'category_id' => $category1->id,
            'image' => 'storage/posts/1.jpg',
            'user_id' => $author1->id,
        ]);
        $post2 = $author2->posts()->create([
            'title' => 'Top 5 brilliant content marketing strategies.',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry1.',
            'category_id' => $category2->id,
            'image' => 'storage/posts/2.jpg',
        ]);
        $post3 =  $author3->posts()->create([
            'title' => 'Best practices for minimalist design with example.',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry1.',
            'category_id' => $category3->id,
            'image' => 'storage/posts/3.jpg',
            
        ]);
        $post4 =  $author2->posts()->create([
            'title' => 'Congratulate and thank to Maryam for joining our team.',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry1.',
            'category_id' => $category2->id,
            'image' => 'storage/posts/4.jpg',
        ]);
        $tag1 = Tag::create([
            'name' => 'job'
        ]);
        $tag2 = Tag::create([
            'name' => 'customers'
        ]);
        $tag3 = Tag::create([
            'name' => 'record'
        ]);
        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag2->id, $tag3->id]);
        $post2->tags()->attach([$tag1->id, $tag3->id]);
    }
}
