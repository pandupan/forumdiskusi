<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mari Diskusi
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="card my-4 bg-white">
                <div class="card-body">
                    <h2 class="text-xl font-bold">{{ $diskusi->user->name }}</h2>
                    <p> {{ $diskusi->content }} </p>
                    <div class="text-end">
                        @can('update', $diskusi)
                            <a href="{{ route('diskusi.edit', $diskusi->id) }}" 
                                class="link link-hover text-blue-400 text-xs">
                                Edit
                        </a>
                        @endcan
                        <span class="text-xs">
                            {{ $diskusi->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="card my-4 bg-white">
                <div class="card-body">
                    <form 
                        action='{{ route('comment.store', $diskusi) }}'
                        class="form-control"
                        method="post"
                    >
                        @csrf
                        <h2 class="text-xl font-bold">Komentar</h2>
                        <textarea class="block textarea textarea-bordered bg-white" name="comment" row="3" placeholder="Tinggalkan komentar...">
                        </textarea>
                        <input class="btn btn-secondary" type="submit" value="Komentar">
                    </form>
                </div>
            </div>

            @foreach ($diskusi->Comments as $comment )
                <div class="card my-4 bg-white">
                    <div class="card-body">
                        <h2 class="text-xl font-bold">{{ $comment->user->name }}</h2>
                        <p> {{ $comment->comment }} </p>
                        <div class="text-end">
                            @can('update', $comment)
                                <a href="{{ route('diskusi.edit', $comment->id) }}" 
                                    class="link link-hover text-blue-400 text-xs">
                                    Edit
                            </a>
                            @endcan
                            @can('delete', $comment)
                                <form action="{{ route('diskusi.destroy', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error btn-sm">Hapus</button>
                                </form>
                            @endcan
                            <span class="text-xs">
                                {{ $comment->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
