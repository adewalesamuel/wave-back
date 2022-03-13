<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreComment as StoreCommentRequest;
use App\Http\Requests\UpdateComment as UpdateCommentRequest;
use App\Jobs\SendMailNotification;
use App\Notifications\NewComment as NewCommentNotification;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::where('id', '>', -1)->with('user')
        ->paginate(env('PAGNINATE'));
        $data = [
            'success' => true,
            'data' => [
                'comments' => $comments
                ]
            ];
        
        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        $data = $request->validated();
        
        $comment = new Comment;

        $comment->post_id = $data['post_id'];
        $comment->comment = $data['comment'];
        $comment->user_id = auth('api')->user()->id;

        $comment->save();

        $post_owner_email = $data['post_owner_email'] ?? 'samuel.adewale@epistrophe.ci';
        $user = User::where('email', $post_owner_email)->first();
        
        if ($user) {
            SendMailNotification::dispatchAfterResponse(
                $user,
                new NewCommentNotification( [
                    'post_id' => $data['post_id'],
                    'comment' => $data['comment'],
                    ]), 
                [
                    'post_id' => $data['post_id'],
                    'comment' => $data['comment'],
                    ]
            );
        }

        $data = [
            'success' => true,
            'data' => [
                'comment' => $comment
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {         
        $data = $request->validated();
        
        $comment->comment = $data['comment'];

        $comment->save();

        $data = [
            'success' => true,
            'data' => [
                'comment' => $comment
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {   
        if (Comment::findOrFail($comment->id)->user_id !== auth('api')->user()->id) {
            $data = [
                'error' => true,
                'message' => 'Unauthorized'
            ];

            return response()->json($data, 500);
        }   

        $comment->delete();

        $data = [
             'success' => true,
             'data' => [
                 'comment' => $comment
                 ]
             ];
             
         return response()->json($data, 200);
    }
}
