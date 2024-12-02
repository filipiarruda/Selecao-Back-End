<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'message' => 'required|string|max:700',
        ]);
        if ($request->has('message') && !empty($request->message)) {
            $message = $request->message;
            $comment = Comment::create(['user_id' => $user->id, 'message' => $message]);
            return response()->json(['message' => 'Comentário adicionado com sucesso!', 'comment' => $comment->only('message', 'created_at', 'updated_at')], 201);
        } else {
            return response()->json(['message' => 'Ocorreu um erro, verifique os campos', 'user' => $user], 422);
        }
    }

    public function listComments()
    {
        $comments = Comment::with('user') 
            ->get()
            ->map(function ($comment) {
                return [
                    'message' => $comment->message,
                    'created_at' => $comment->created_at,
                    'updated_at' => $comment->updated_at,
                    'author' => $comment->user->name ?? 'Anônimo', 
                ];
            });
        return response()->json([$comments], 201);
    }
}
