<div>
    <div class="md:w-2/3 lg:w-1/2 mx-auto">
        @foreach ($posts as $post )
            <div class="mb-6 border border-gray-400">
                <a href="{{ route('posts.show',['post'=>$post, 'user'=>$post->user])}}">
                    <img src="{{asset('uploads').'/'.$post->imagen}}" alt="{{'imagen '.$post->titulo}}">
                </a>
                <div class="p-3">

                    <div class="flex gap-5 items-start">
                        <livewire:like-post :post="$post">
    
                        <div class="flex gap-2 items-start" >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                            </svg>
                            <p class="font-semibold">{{ $post->comentarios->count()}} comments</p>
        
                        </div>
                    </div>
                    

                    <div class="flex items-center gap-2">
                        <a href="{{route('posts.index',$post->user->username)}}">
                            <p class="font-bold">{{$post->user->username}}</p>
                        </a>
                        <p>{{$post->titulo}}</p>
                    </div>
        
                    <div>
                        <p class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div> 
                
            </div>
        @endforeach
    </div>

    <div class="mt-6">

        {{$posts->links()}}
    </div>
</div>
