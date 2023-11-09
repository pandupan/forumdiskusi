<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Memulai Topik yang akan didiskusikan -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card bg-white">
                <div class="card-body">                
                    <form action="{{ route('diskusi.store') }}" method="post">
                        @csrf
                        <textarea name="content" class="textarea textarea-bordered w-full bg-white" placeholder="apa yang ingin kamu diskusikan? " rows="3"></textarea>
                        <input type="submit" value="Kirim!" class="btn btn-primary">
                    </form>    
                </div>
            </div>

            @foreach ($diskusi as $diskus)
            <div class="card my-4 bg-white">
                <div class="card-body">
                    <h2 class="text-xl font-bold">{{ $diskus->user->name}}</h2>
                    <p> {{ $diskus->content }} </p>
                    <div class="text-end">
                        @can('update', $diskus)
                            <a href="{{ route('diskusi.edit', $diskus->id) }}" 
                                class="link link-hover text-blue-400 text-xs">
                                Edit
                            </a>
                        @endcan
                        @can('delete', $diskus)
                        <form action="{{ route('diskusi.destroy', $diskus->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-error btn-sm">Hapus</button>
                        </form>
                        
                        @endcan
                        <span class="text-xs">
                            {{ $diskus->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
