<div class="md:w-1/2 p-5">
    <div class="shadow-xl bg-white p-5">

        @auth
            
        <p class="text-xl font-bold text-center">Agrega un comentario</p>

        <form wire:submit.prevent ='agregarComentario'>
            <div class="mb-4">
                <label for="comentario" class=" text-gray-500 font-bold ">Tu comentario</label>
                <textarea value="{{ old('comentario')}}" wire:model="comentario" id="comentario" class=" rounded-lg p-2 border block w-full mt-2 @error('comentario') border-red-500 @enderror" placeholder="Agrega un comentario" cols="30" rows="2" ></textarea>
                @error("comentario")
                    <p class="pl-1 text-red-400 font-semibold text-sm">{{$message}}</p>
                @enderror
            </div>

            <input  type="submit" class=" p-3 rounded-xl block w-full cursor-pointer md:w-1/2 md:mx-auto bg-blue-600 hover:bg-blue-700 text-white font-bold " value="Comentar">
            
            @if (session('mensaje'))
                <p class="pl-1 mt-4 text-green-700 rounded-lg text-center font-semibold text-lg bg-green-200">{{session('mensaje')}}</p>
            @endif
        </form>

        @endauth
                        
        @if (count($comentarios))
        <div class="mt-8">
            @foreach ($comentarios as $comentario_actual)
            {{-- la realcion es equivalente a realizar una consulta talque asi:  --}}
            {{-- SELECT * FROM devstagram.comentarios WHERE post_id = <$post->id> ; --}}
                    <div class="mt-2 border-gray-300 border-b flex justify-between items-center">
                        <div>
                            <p><a href="{{route('posts.index', $autores[$comentario_actual->user_id])}}" class="font-bold text-normal">{{$autores[$comentario_actual->user_id] .' '}}</a>{{$comentario_actual->comentario}}</p>
                            <p class="text-gray-500 text-sm">{{ $comentario_actual->created_at->diffForHumans() }}</p>
                        </div>
                        
                        @if (auth()->user()->id === $comentario_actual->user_id)
                            <div wire:click="$emit('eliminar',{{$comentario_actual->id}})" class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-600 font-bold mt-8">No hay comentarios</p>
        @endif

    </div>

    @push('scripts')
        <script>

            Livewire.on('eliminar',(id)=>{
                const res = confirm('Deseas eliminar el comentario?')

                if (res) {
                    //llamar al metodo de livewire
                    Livewire.emit('eliminarComentario', id);
                }
            })
            
        </script>
    @endpush
</div>