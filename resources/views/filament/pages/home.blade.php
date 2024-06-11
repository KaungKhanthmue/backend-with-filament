<x-filament-panels::page>
    <div class="w-[1700px]  bg-gray-700 shadow-lg">

        <div class="w-full h-[50px]  flex justify-end pr-[200px] py-6">
            <div class="w-[200px] h-[40px] rounded-lg bg-blue-400 px-16 py-2 text-bold" wire:click="modelBoxOnOff">
                add Post
            </div>
        </div>
        <div class=" w-full flex flex-col container mx-auto">
        <div class="flex justify-center">
        <div class="relative w-[85%] py-10 h-[400px] overflow-hidden">
            <div id="carousel" class="flex w-full transition-transform duration-300 gap-3">
                <div class="carousel-item h-[350px] bg-gray-600 rounded-2xl relative ml-2" style="flex: 0 0 auto;width: 280px;" >
                    <div class="absolute top-0 bottom-0 w-full h-full"></div>
                    <img class="rounded-full absolute w-10 h-10 border-solid border-4 border-blue-500 my-3 mx-3" src="https://imgs.search.brave.com/mvfoPoPUoRk0ZMyKGsbxyZ8OLvQQqArJlcYMTfK1pOg/rs:fit:500:0:0/g:ce/aHR0cHM6Ly91cGxv/YWQud2lraW1lZGlh/Lm9yZy93aWtpcGVk/aWEvY29tbW9ucy90/aHVtYi9iL2I5LzIw/MjNfRmFjZWJvb2tf/aWNvbi5zdmcvMjIw/cHgtMjAyM19GYWNl/Ym9va19pY29uLnN2/Zy5wbmc" alt="">
                    <div class="w-full h-[60%] bg-gray-500"></div>
                    <div class="w-full h-[40%] border-t-4 border-gray-600 rounded-md" wire:click="newFellOnOff">
                        <div class="w-[75px] h-[75px] rounded-full z-20 absolute p-1 top-[50%] left-[35%] bg-gray-600">
                            <div class="w-[66px] h-[65px] rounded-full bg-blue-400"></div>
                        </div>
                    </div>
                </div>

                @foreach($this->newFeels as $feel)
                <div class="carousel-item h-[350px] rounded-lg bg-gray-300 p-1" style=" flex: 0 0 auto;width: 240px; ">
                    <img src="{{ url('storage', $feel->image->path) }}" alt="" class="w-full h-full object-cover rounded-lg">
                    <div class=" h-[15%] absolute top- w-[280px] top-[80%] py-1 flex px-2 ">
                        <div class="w-[50px] h-[50px] rounded-full bg-blue-500">
                            <img src="{{url('storage',$feel->image->path)}}" class="border border-white w-full h-full rounded-full" alt="">
                        </div>
                        <div class="w-[230px] p-2 text-bold font-semibold text-white ">{{$feel->user->name}}</div>
                    </div>
                </div>
                @endforeach
            </div>
            <button id="prev" class="absolute z-40 left-0 outline-4 outline-blue-500 top-1/2 transform -translate-y-1/2 p-2 bg-white text-black rounded-full"><</button>
            <button id="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 p-2  rounded-full bg-white text-black">></button>
        </div>
    </div>


            <div class="w-full mx-auto flex container mx-auto ">
                <div class=" flex justify-center ">
                    <div class="w-[84%]  bg-gray-100 rounded-lg">
                        <div class="bg-white w-full h-32 rounded-md shadow-md">
                            <div class="w-full h-16 flex items-center flex justify-between px-5">
                                <img class=" rounded-full w-10 h-10 mr-3" src="https://imgs.search.brave.com/mvfoPoPUoRk0ZMyKGsbxyZ8OLvQQqArJlcYMTfK1pOg/rs:fit:500:0:0/g:ce/aHR0cHM6Ly91cGxv/YWQud2lraW1lZGlh/Lm9yZy93aWtpcGVk/aWEvY29tbW9ucy90/aHVtYi9iL2I5LzIw/MjNfRmFjZWJvb2tf/aWNvbi5zdmcvMjIw/cHgtMjAyM19GYWNl/Ym9va19pY29uLnN2/Zy5wbmc" alt="">
                                <input type="text" class=" w-full rounded-full h-10 bg-gray-200 px-5" placeholder="Apa yang Anda pikirkan, Sudana?">
                            </div>
                            <div class="w-full h-16 flex justify-between px-3 md:px-10 lg:px-24 xl:px-5">
                                <div class=" flex h-full items-center">
                                    <svg class="h-12 fill-current text-red-500 stroke-current" xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" fill="none" stroke="#b0b0b0" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                                        <path d="M15.6 11.6L22 7v10l-6.4-4.5v-1zM4 5h9a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V7c0-1.1.9-2 2-2z" />
                                    </svg>
                                    <span class="text-xs lg:text-md mx-2 font-semibold text-gray-500"> Video Siaran Langsung </span>
                                </div>
                                <div class=" flex h-full items-center">
                                    <svg class="h-12  text-green-500 stroke-current" xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" fill="none" stroke="#b0b0b0" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                                        <rect x="3" y="3" width="18" height="18" rx="2" />
                                        <circle cx="8.5" cy="8.5" r="1.5" />
                                        <path d="M20.4 14.5L16 10 4 20" />
                                    </svg>
                                    <span class="text-xs lg:text-md mx-2 font-semibold text-gray-500"> Foto/Video </span>
                                </div>
                                <div class="hidden xl:flex h-full items-center">
                                    <svg class="h-12  text-yellow-500 stroke-current" xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" fill="none" stroke="#b0b0b0" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                                        <path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3" />
                                        <circle cx="12" cy="10" r="3" />
                                        <circle cx="12" cy="12" r="10" />
                                    </svg>
                                    <span class="text-xs lg:text-md mx-2 font-semibold text-gray-500"> Perasaan Aktivitas </span>
                                </div>
                            </div>
                        </div>
                        @foreach($this->getPosts as $post)
                        <div class="bg-white w-full rounded-md shadow-md h-auto py-3 px-3 my-5">
                            <div class="w-full h-16 flex items-center flex justify-between ">
                                <div class="flex">
                                    <img class=" rounded-full w-10 h-10 mr-3" src="https://imgs.search.brave.com/mvfoPoPUoRk0ZMyKGsbxyZ8OLvQQqArJlcYMTfK1pOg/rs:fit:500:0:0/g:ce/aHR0cHM6Ly91cGxv/YWQud2lraW1lZGlh/Lm9yZy93aWtpcGVk/aWEvY29tbW9ucy90/aHVtYi9iL2I5LzIw/MjNfRmFjZWJvb2tf/aWNvbi5zdmcvMjIw/cHgtMjAyM19GYWNl/Ym9va19pY29uLnN2/Zy5wbmc" alt="">
                                    <div>
                                        <h3 class="text-md font-semibold dark:text-black">{{$post->user->name}}</h3>
                                        <p class="text-xs text-gray-500">45 mnt</p>
                                    </div>
                                </div>
                                <svg class="w-16" xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" fill="none" stroke="#b0b0b0" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="19" cy="12" r="1"></circle>
                                    <circle cx="5" cy="12" r="1"></circle>
                                </svg>
                            </div>
                            <p class="dark:text-black p-4">{{$post->description}}</p>

                            @if($post->image?->path != null)
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <img class="h-auto max-w-full rounded-lg" src="{{url('storage',$post->image?->path)}}" alt="">
                                </div>
                                <div>
                                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
                                </div>
                                <div>
                                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
                                </div>
                                <div>
                                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
                                </div>
                            </div>
                            @endif
                            <div class="w-full h-8 flex items-center px-3 my-3">
                                <div class="bg-blue-500 z-10 w-5 h-5 rounded-full flex items-center justify-center ">
                                    <svg class="w-3 h-3 fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" fill="none" stroke="#b0b0b0" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                                        <path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path>
                                    </svg>
                                </div>
                                <div class="bg-red-500 w-5 h-5 rounded-full flex items-center justify-center -ml-1">
                                    <svg class="w-3 h-3 fill-current stroke-current text-white" xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" fill="none" stroke="#b0b0b0" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                    </svg>
                                </div>

                                <div class="w-full flex justify-between">
                                    <p class="ml-3 text-gray-500">8</p>
                                    <p class="ml-3 text-gray-500">29 comment</p>
                                </div>
                            </div>
                            <hr>
                            <div class="grid grid-cols-3 w-full px-5 px-5 my-3">
                                <button class="flex flex-row justify-center items-center w-full space-x-3"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" fill="none" stroke="#838383" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                                        <path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path>
                                    </svg>
                                    <span class="font-semibold text-lg text-gray-600">sukai</span></button>
                                <button class="flex flex-row justify-center items-center w-full space-x-3"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" fill="none" stroke="#838383" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                    <span class="font-semibold text-lg text-gray-600">komentari</span></button>

                                <button class="flex flex-row justify-center items-center w-full space-x-3"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" fill="none" stroke="#838383" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                                        <circle cx="18" cy="5" r="3"></circle>
                                        <circle cx="6" cy="12" r="3"></circle>
                                        <circle cx="18" cy="19" r="3"></circle>
                                        <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                        <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                                    </svg>
                                    <span class="font-semibold text-lg text-gray-600">Share</span></button>
                            </div>
                            <hr>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        @if($modelBox == 1 )
        <div class="z-10 absolute w-full h-[900px]  top-[0%]  rounded-2xl p-6 flex justify-center pt-[10%]" wire:click="off">
            </div>

            <div class="w-[800px] h-[400px] bg-gray-700 bg-opacity-50  p-4 rounded-2xl z-20 absolute   top-[20%] left-[30%]  bg-opacity-75">
            @livewire('post.create-post',[
            'modelBox' => $modelBox])
        </div>
        @endif
        @if($newFeel == 1)
        <div class="z-10 absolute w-full h-[900px]  top-[0%]  rounded-2xl p-6 flex justify-center pt-[10%]" wire:click="off">
            </div>

            <div class="w-[800px] h-[400px] bg-gray-700 bg-opacity-50  p-4 rounded-2xl z-20 absolute   top-[20%] left-[30%]  bg-opacity-75">
            @livewire('new-fell.create-new-fell',[
            'modelBox' => $modelBox])
        </div>
        @endif
    </div>
</x-filament-panels::page>

<script>
    const carousel = document.getElementById('carousel');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    let currentIndex = 0;

    function updateCarousel() {
        carousel.style.transform = `translateX(-${currentIndex * 25}%)`;
    }

    prevButton.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = carousel.children.length - 1;
        }
        updateCarousel();
    });

    nextButton.addEventListener('click', () => {
        if (currentIndex < carousel.children.length - 1) {
            currentIndex++;
        } else {
            currentIndex = 0;
        }
        updateCarousel();
    });
</script>