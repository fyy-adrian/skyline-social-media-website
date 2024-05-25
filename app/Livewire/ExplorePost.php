<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;
use App\Models\Notification;
use App\Models\Comment;
use App\Models\Share;
use App\Models\Like;
use App\Models\User;
use App\Models\Follow;

class ExplorePost extends Component
{
    public $posts;
    public $categories;
    public $slug;
    public $border;
    public $notif;
    public $postId;
    public $openModal = false;
    public $title = 'explore';
    public $users;
    public $keyword;
    
    public function render()
    {
        
        $this->border = 'post';
        $this->categories = Category::all();
        
        $this->notif = Notification::where('user_id', auth()->user()->id)->latest()->first();
        
        if($this->slug){
          $this->posts = Category::where('slug', $this->slug)->get();
        }else{
          $this->posts = Category::latest()->get();
        }

        if($this->keyword !== null){
          $this->users = User::with('followers')->where('name', 'like', '%' . $this->keyword . '%')->latest()->get();
        }else{
          $this->users = User::with('followers')->latest()->take(10)->get();
        }

        return view('livewire.explore-post');
    }
    public function selectCategory($categorySlug){
      $this->slug = $categorySlug;
    }
    
    public function addLike($postId)
    {
        $user = Post::find($postId)->user;
        
        Like::create([
            "user_id" => auth()->user()->id,
            "post_id" => $postId
        ]);
        
        Notification::create([
          "body" => auth()->user()->username . ' like your post',
          "user_id" => $user->id,
          "hyperlink" => '/post/' . $postId,
          "is_read" => false
        ]);
    }

    public function removeLike($postId)
    {
        $userId = auth()->user()->id;

        $like = Like::where('user_id', $userId)->where('post_id', $postId)->first();

        if ($like) {
            $like->delete();
        }
    }
    
    public function shareModal($id){
      $this->openModal = true;
      $this->postId = $id;
    }
    
    public function closeModal(){
      $this->openModal = false;
    }
    
    public function handleShare($id){
      Share::create([
        "user_id" => auth()->user()->id,
        "post_id" => $id,
        'caption' => $this->shareCaption
      ]);
    }

    public function handleFollow($id, $username)
    {
        Follow::create([
            "from_user_id" => auth()->user()->id,
            "to_user_id" => $id
        ]);
        
        Notification::create([
          "body" => auth()->user()->username . ' follow your account',
          "user_id" => $id,
          "hyperlink" => "/user/" . $username,
          "is_read" => false
        ]);
    }
    
    public function handleUnfollow($id)
    {
      $userId = auth()->user()->id;
  
      $follow = Follow::where('to_user_id', $id)->where('from_user_id', $userId)->first();
  
      if ($follow) {
        $follow->delete();
      }
    }
  
}
