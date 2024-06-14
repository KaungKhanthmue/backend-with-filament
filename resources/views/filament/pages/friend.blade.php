<x-filament-panels::page>
    <div class="w-[1700px]  bg-gray-700 ">
        <div class="  flex flex-col container mx-auto   rounded-md mt-5  ">
            <div class="w-[85%] border-b border-gray-400 bg-gray-600 mx-auto container  py-4">
                <h1 class="text-3xl text-white font-bold mx-2 my-4">Friends</h1>
                <button
                    class="w-[200px] h-[45px] bg-gray-500 bg-opacity-75 rounded-full text-gray-200 font-medium ">Suggestions</button>
                <button
                    class="w-[200px] h-[45px] bg-gray-500 bg-opacity-75 rounded-full text-gray-200 font-medium ">Your
                    friends</button>
                <button
                    class="w-[200px] h-[45px] bg-gray-500 bg-opacity-75 rounded-full text-gray-200 font-medium ">Close
                    Friends</button>
            </div>
            <div class="w-[85%] border-b border-gray-900 bg-gray-600 mx-auto container py-4 px-4">
                <h1 class="text-2xl text-white font-bold mx-2 my-4">Friend request </h1>
                @foreach($this->friendRequest as $requestUser)
                <div class="flex py-1 bg-gray-500 my-2 rounded-md">
                    <div class="w-[10%] h-[130px] bg-white rounded-full">
                        <img src="{{($requestUser->profile_image)}}" class="w-full h-full rounded-full" alt="">
                    </div>
                    <div class="w-[90%] h-[130px]  mx-2">
                        <h1 class="text-xl text-white font-bold mx-2 my-1">{{$requestUser->name}}</h1>
                        <div class="w-full h-[40px]  flex">
                            <div class="w-[40px] h-[40px] rounded-full bg-blue-200"></div>
                            <div class="w-[40px] h-[40px] rounded-full bg-yellow-200"></div>
                            <div class="text-gray-200 my-2 mx-2 "> 23 mutual friends</div>
                        </div>
                        <div class="flex justify-end gap-4 mx-2">

                            <div
                                class="bg-blue-600 px-6 py-1 w-[200px] h-[45px] rounded-lg text-white text-lg px-[60px]">
                                {{($this->comfirm)(['xxId'=>$requestUser->id])}}</div>
                            <button
                                class="bg-gray-600 px-6 py-1 w-[200px] h-[45px] rounded-lg text-white text-lg">Remove</button>
                        </div>
                    </div>
                </div>
                @endforeach
                <button class="w-full h-[50px] bg-gray-700 mt-4  rounded-lg text-xl font-medium text-white">See all
                    friends</button>
            </div>
            <div class="w-[85%] border-b border-gray-900 bg-gray-600 mx-auto container py-4 px-4">
                <h1 class="text-2xl text-white font-bold mx-2 ">People you may know</h1>
                @foreach($this->userAll as $user)
                <div class="flex py-1 bg-gray-500 my-2 rounded-md">
                    <div class="w-[10%] h-[130px] bg-white rounded-full">
                        <img src="{{($user->profile_image)}}" class="w-full h-full rounded-full" alt="">
                    </div>
                    <div class="w-[90%] h-[130px]  mx-2">
                        <h1 class="text-xl text-white font-bold mx-2 my-1">{{$user->name}}</h1>
                        <div class="w-full h-[40px]  flex">
                            <div class="w-[40px] h-[40px] rounded-full bg-blue-200"></div>
                            <div class="w-[40px] h-[40px] rounded-full bg-yellow-200"></div>
                            <div class="text-gray-200 my-2 mx-2 "> 23 mutual friends</div>
                        </div>
                        <div class="flex justify-end gap-4 mx-2">
                            <div
                                class="bg-blue-600 px-6 py-1 w-[200px] h-[45px] rounded-lg text-white text-lg px-[48px]">
                                {{($this->addFriend)(['addUserId'=>$user->id])}}</div>
                            <button
                                class="bg-gray-600 px-6 py-1 w-[200px] h-[45px] rounded-lg text-white text-lg">Remove</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-filament-panels::page>