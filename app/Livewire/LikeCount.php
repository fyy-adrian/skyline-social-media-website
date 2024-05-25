<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Like;
use App\Models\Post;
use App\Models\Follow;
use App\Models\Comment;
use App\Models\Share;
use App\Models\Notification;

class LikeCount extends Component
{
    public $posts;
    public $following;
    public $shares;
    public $postId;
    public $openModal = false;
    public $shareCaption;
    public $notif;
    public $title;
    public $commentModal = false;
    public $commentId;

    public $news = [
        [
            "author" => "Dan Peck",
            "title" => "Hurricane Hanna makes landfall around 5 p.m. on Saturday.",
            "description" => "Hurricane Hanna battered southern Texas with sustained winds of 75 mph and continued to deliver heavy rain and flash flooding as it moved inland late Saturday.",
            "url" => "https://abcnews.go.com/US/hurricane-hanna-makes-landfall-texas/story?id=71985566",
            "source" => "ABC News",
            "image" => "https://s.abcnews.com/images/US/hanna-swimmer-mo_hpMain_20200725-163152_2_4x3t_384.jpg",
            "category" => "general",
            "language" => "en",
            "country" => "us",
            "published_at" => "2020-07-26T01:04:23+00:00"
        ],
        [
            "author" => "TMZ Staff",
            "title" => "Nicki Minaj's Husband Gets Permission To Be There For Baby's Birth",
            "description" => "Kenneth can be in the room when Nicki gives birth ... a judge just granted his request to tweak his pre-trial release conditions so he can travel with Nicki. With the court's order in place, KP can travel with Nicki periodically on biz…",
            "url" => "https://www.tmz.com/2020/07/30/nicki-minaj-husband-asks-judge-be-there-child-birth/",
            "source" => "TMZ.com",
            "image" => "https://imagez.tmz.com/image/c1/4by3/2020/07/30/c115ad2dc849438a97a0ad3097b416df_md.jpg",
            "category" => "general",
            "language" => "en",
            "country" => "us",
            "published_at" => "2020-08-01T05:34:47+00:00"
        ],
        [
            "author" => "Michael Rothstein",
            "title" => "New Lions safety Jayron Kearse suspended three games",
            "description" => "Kearse, 26, signed with the Lions in March after four seasons in Minnesota, where he played in 62 games with five starts, making 79 tackles and defending eight passes.",
            "url" => "https://www.espn.com/nfl/story/_/id/29572640/new-lions-safety-jayron-kearse-suspended-three-games",
            "source" => "ESPN",
            "image" => "https://a4.espncdn.com/combiner/i?img=%2Fphoto%2F2020%2F0111%2Fr651071_1296x729_16%2D9.jpg",
            "category" => "sports",
            "language" => "en",
            "country" => "us",
            "published_at" => "2020-07-31T23:23:14+00:00"
        ]
    ];

    public $media;
  

    public function render()
    {
        $newsCollection = collect($this->news);

        // Dapatkan satu item secara acak dari koleksi
        $randomNewsItem = $newsCollection->random();
        
        // Tampilkan hasil
        $this->media = $randomNewsItem;

        $this->title = 'home';
        
        $this->notif = Notification::where('user_id', auth()->user()->id)->latest()->first();
         
        $this->posts = Post::with(['likes', 'comments', 'user', 'category'])->latest()->get();
        
        return view('livewire.like-count');
    }

    public function closeCommentModal(){
      $this->commentModal = false;
    }

    public function openCommentModal($id){
      $this->commentId = $id;
      $this->commentModal = true;
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
}
