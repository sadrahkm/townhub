<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function store(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'clean' => 'required|numeric',
            'comfort' => 'required|numeric',
            'staff' => 'required|numeric',
            'facility' => 'required|numeric',
            'description' => 'required',
        ]);
        $avgPoint = (intval($validatedData['clean']) + intval($validatedData['comfort']) + intval($validatedData['staff']) + intval($validatedData['facility'])) / 4;
        $point = json_encode(array(
            'avg' => $avgPoint,
            'points' => [
                'clean' => $validatedData['clean'],
                'comfort' => $validatedData['comfort'],
                'staff' => $validatedData['staff'],
                'facility' => $validatedData['facility'],
            ],
        ));
        $filePaths = null;

        if (!empty($request->file('pictures'))) {
            foreach ($request->file('pictures') as $image) {
                $filePaths[] = $image->store('comment_pictures');
            }
        }
        $filePaths = json_encode($filePaths);
        $user_mention_pattern = '/@([\w._]+)/';
        $user_mention_replacement = "<a href='/$1'>$1</a>";
        $description = preg_replace($user_mention_pattern, $user_mention_replacement, $validatedData['description']);
        $user_id = Auth::id();
        $createdComment = $event->comments()->create([
            'user_id' => $user_id,
            'description' => $description,
            'gallery' => $filePaths,
            'point' => $point,
        ]);
        return redirect()->back()->with(['status' => true, 'description' => 'Your comment has successfully sent !']);
    }

    public function rate(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|numeric'
        ]);
        $user = Auth::user();
        $rateRecord = DB::table('rates')->where('user_id', $user->id)->where('comment_id', $validatedData['id']);
        $comment = Comment::find($validatedData['id']);
        if ($rateRecord->exists()) {
            $deletedRecord = $rateRecord->delete();
            $comment->likes = intval($comment->likes) - 1;
            $comment->save();
            return $deletedRecord ? Comment::DISLIKE : false;
        } else {
            $insertedRecord = DB::table('rates')->insert(
                ['user_id' => $user->id, 'comment_id' => $validatedData['id']]
            );
            $comment->likes = intval($comment->likes) + 1;
            $comment->save();
            return $insertedRecord ? Comment::LIKE : false;
        }
    }
}
