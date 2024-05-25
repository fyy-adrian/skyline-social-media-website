<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Notification;

class PostCrud extends Component
{
    use WithFileUploads;

    public $caption;
    public $posts;
    public $categories;
    public $category = 0;
    public $image;
    public $notif;
    public $title = 'create post';
    
    protected $rules = [
        'caption' => 'nullable|string',
        'category' => 'required',
        'image' => 'nullable|image|max:2024',
    ];

    public function render()
    {
        $this->notif = Notification::where('user_id', auth()->user()->id)->latest()->first();
        $this->posts = Post::where('user_id', auth()->user()->id)->get();
        $this->categories = Category::all();
        return view('livewire.post-crud');
    }

  public function createPost()
  {
      $this->validate();
      
      $category = $this->category ? $this->category : 0;
      
      $image = null;
      
      if($this->image){
        $image = $this->image->store(path: 'image-post');
      }
      
      Post::create([
        "caption" => $this->caption ?? '',
        "user_id" => auth()->user()->id,
        "category_id" => $category,
        "image" => $image ? $image : null
      ]);

  
      return redirect('/');
  }

}