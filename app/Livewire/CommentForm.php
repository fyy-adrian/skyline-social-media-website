<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;

class CommentForm extends Component
{
    public $comment = "tes";
    public $postId;
    public $body;

    public function mount($id){
        $this->postId = $id;
    }

    public function createComment(){
        Comment::create([
            "user_id" => auth()->user()->id,
            "post_id" => $this->postId,
            'image' => null,
            'body' => $this->body
        ]);

        $this->body = '';
    }

    public function render()
    {
        return view('livewire.comment-form', [
            'comments' => Comment::where('post_id', $this->postId)->get()
        ]);
    }
}
