<div>
   <nav class="fixed top-0 z-50 w-full bg-white border-b border-b-gray-200 sm:border-gray-200">
      <div class="px-3 py-3 lg:px-5 lg:pl-3">
         <div class="flex items-center justify-between">
               <p class="pl-2 self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">SKYLINE</p>

               <div class="flex items-center mr-3 hidden sm:block ">           
                  @if (auth()->user()->profile_photo_path)
                     <a href="/profile" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300" aria-expanded="false">
                        <img class="w-8 h-8 rounded-full" src="{{ asset('storage/' . auth()->user()->profile_photo_path) }} " alt="">
                     </a>
                  @else
                     <a href="/profile" class="mr-4">
                        <i class="bi bi-person-circle text-[36px] mx-1"></i>
                     </a>
                  @endif
               </div>
               <div class="block sm:hidden group relative">
                <a href="/skychat" class="text-white bg-sky-400 rounded inline-block flex flex-row px-3 py-1.5 gap-1 hover:shadow-inner transition-all duration-300 ease-in-out overflow-hidden hover:pr-16 justify-between items-center">
                    <i class="bi bi-chat-heart items-center"></i>
                    <p class="hidden absolute group-hover:block text-xs font-inter font-bold transition-all duration-300 ease-in-out right-3">skychat</p>
                </a>
            </div>
         </div>
      </div>
   </nav>
 
   <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
      <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
         <ul class="space-y-2 font-medium">
            <li>
               <a href="/" class="flex items-center p-2 rounded-lg hover:bg-gray-100 group">
                  <i class="bi bi-house-door text-2xl"></i>
                  <span class="hidden lg:block ms-3">Home</span>
               </a>
            </li>
            <li>
               <a href="/explore" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                  <i class="bi text-2xl bi-grid "></i>
                  <span class="hidden lg:block flex-1 ms-3 whitespace-nowrap">Explore</span>
               </a>
            </li>
               <li>
               <a href="/createpost" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                  <i class="bi text-2xl bi-plus-circle"></i>
                  <span class="hidden lg:block flex-1 ms-3 whitespace-nowrap">Create post</span>
               </a>
            </li>
            <li>
               <button onclick="toggleModal()" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                  <i class="bi bi-bell text-2xl"></i>
                  <span class="hidden lg:block flex-1 ms-3 whitespace-nowrap">Notifications</span>
                  <span class="hidden lg:inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">3</span>
               </button>
            </li>
            <li>
               <a href="/skychat" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                  <i class="text-2xl bi bi-chat-heart"></i>
                  <span class="hidden lg:block flex-1 ms-3 whitespace-nowrap">Skychat</span>
               </a>
            </li>
            <li>
               <a href="/profile" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                  <i class="bi text-2xl bi-person-circle"></i>
                  <span class="hidden lg:block flex-1 ms-3 whitespace-nowrap">Profile</span>
               </a>
            </li>
         </ul>
      </div>
   </aside>
   {{-- POP UP --}}
      <div id="modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed  z-50 justify-center items-center w-full md:inset-0 h-screen flex backdrop-blur-sm bg-white/30">
         <div class="relative p-4 w-full max-w-md h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow h-full overflow-auto h-96 overflow-scroll">
                  <!-- Modal header -->
                  <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                     <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Notifications
                     </h3>
                     <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="toggleModal()">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                     </button>
                  </div>
                  <!-- Modal body -->
                  @livewire('notification-list')
            </div>
         </div>
      </div>
   {{-- POP UP END--}}

   <script>
      const modal = document.getElementById("modal")
      function toggleModal(){
         modal.classList.toggle("hidden")
      }
   </script>
   
</div>


