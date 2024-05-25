<p class="text-[14px] text-gray-800 mb-[-5px]">{{$post->user->name ?? 'akun pengguna'}}</p>
<p class="text-[12px] text-gray-400">@<span>{{$post->user->username ?? 'akun pengguna'}}</span> <span class="font-black text-lg">.</span> {{$post->created_at->diffForHumans()}}
</p>
<div class="mt-3 flex flex-col gap-3">
    <p class="text-[14px] font-medium text-slate-800">{{$post->caption ?? ''}}</p>
    <div class="w-[190px]">
        @if($post->image)
        <img class="max-w-[190px] rounded mb-1.5" src="{{ asset('storage/' . $post->image) }}">
        @endif
        <div class="flex flex-row text-[14px] px-1 justify-start gap-7">
            @if ($post->likes->contains('user_id', auth()->user()->id))
            <span>
                <div class="flex flex-row items-center justify-center gap-1 cursor-pointer">
                    <i class="bi bi-heart-fill text-rose-500" wire:click="removeLike({{$post->id}})"></i>
                    <p class="text-[7px]">{{$post->likes->count()}}</p>
                </div>
            </span>
            @else
            <span>
                <button class="flex flex-row items-center justify-center gap-1 cursor-pointer">
                    <i class="bi bi-heart" wire:click="addLike({{$post->id}})"></i>
                </button>
            </span>
            @endif
            <div wire:click="openCommentModal('{{$post->id}}')" class=" pointer">
                <span>
                    <div class="flex flex-row items-center justify-center gap-1 cursor-pointer">
                        <i class="bi bi-chat-square"></i>
                        @if($post->comments->count())
                        <p class="text-[7px]">{{$post->comments->count()}}</p>
                        @endif
                    </div>
                </span>
            </div>
            <!-- <button wire:click="tes" >
                    <i onclick="shareModal()" class="bi bi-arrow-left-right"></i>
                </button> -->

            <span>
                <button class="group flex flex-col items-center justify-center hover:text-slate-400" wire:click="shareModal('{{$post->id}}')">
                    <i class="bi bi-arrow-left-right"></i>
                </button>
            </span>
        </div>
    </div>
</div>
