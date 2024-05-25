<div>
    @if ($comments->count() > 0)
        @foreach ($comments as $comment)
            <!-- Sample Comment 1 -->
            <div class="flex mt-4">
                <div class="w-14 h-14 rounded-full bg-sky-400/50 flex-shrink-0 flex items-center justify-center">
                    <img class="h-12 w-12 rounded-full object-cover" src="{{ asset('storage/component/profile.png') }}"
                                    alt="">
                </div>
        
                <div class="ml-3">
                    <a href="/user/{{$comment->user->username}}" class="font-medium text-sky-800">{{$comment->user->username ?? 'akun pengguna'}}</a>
                    <div class="text-gray-600">{{$comment->user->created_at->diffForHumans() ?? 'no comment'}}</div>
                    <div class="mt-2 text-sky-800">{{$comment->body ?? ''}}
                    </div>
                </div>
            </div> 
        @endforeach        
    @else
        <section id="jika tidak ada komentar" class="flex mt-11 flex-col justify-center items-center gap-3 gap-3 py-4">
            <span>
            <i class="bi bi-chat-square text-sky-500"></i>
            </span>
            <p>Be the first one to comment!</p>
        </section>
    @endif

    <div class="my-52"></div>

    <!-- Comment Form -->
    <form class="fixed bottom-20 w-[90%] max-w-lg" wire:submit="createComment">
        <div class="mb-4">
            <textarea wire:model="body" id="comment" name="comment" class="border-2 border-sky-600 p-2 w-full rounded" required></textarea>
        </div>

        <div class="flex flex-wrap gap-4 w-full">
            {{-- <input wire:model="image" accept="Image/*" id="example1" type="file" class="mt-2 block w-full text-sm file:mr-4 file:rounded-md file:border-0 file:bg-sky-700 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-sky-600 focus:outline-none disabled:pointer-events-none disabled:opacity-60" /> --}}

        <button type="submit"
                    class="bg-sky-700 text-white font-medium py-2 px-4 rounded hover:bg-sky-600">Send
                    Comment
        </button>
        </div>
    </form>
</div>