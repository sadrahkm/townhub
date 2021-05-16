<?php

use App\Models\Comment;
use App\Models\Event;
use App\User;
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
        // $this->call(UsersTableSeeder::class);
        for ($i = 0; $i < 5; $i++) {
            $user = factory(User::class)->create();
            factory(Event::class, rand(1, 10))->create(['user_id' => $user->id])->each(function ($event) use ($user) {
                factory(Comment::class, rand(1, 5))->make()->each(function ($comment) use ($user, $event) {
                    $comment->user_id = $user->id;
                    $comment->event_id = $event->id;
                    $event->comments()->save($comment);
                });
            });
        }
    }
}
