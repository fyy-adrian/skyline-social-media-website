<section class="w-full rounded-lg border-2 border-sky-600 p-4 my-8 mx-auto h-[100vh] sm:h-[80vh] max-w-xl overflow-y-scroll bg-white relative">
    <div class="flex justify-between">
        <h3 class="font-os text-lg font-bold">Comments</h3>
        <h3 class="font-os text-lg font-bold cursor-pointer" wire:click="closeCommentModal">Tutup</h3>
    </div>
    
    @livewire('comment-form', ['id' => $commentId])
</section>