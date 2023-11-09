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
                    <form action="{{ route('diskusi.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <textarea name="content" class="textarea textarea-bordered w-full bg-white" placeholder="apa yang ingin kamu diskusikan? " rows="3"></textarea>
                        <input type="submit" value="Kirim!" class="btn btn-primary"  style="margin-right: 10px;">
                        <select name="kategori" class="form-select" style="margin-right: 10px;">
                            <option value="kategori1">Kategori 1</option>
                            <option value="kategori2">Kategori 2</option>
                            <!-- Tambahkan lebih banyak kategori sesuai kebutuhan -->
                        </select>
                        <input type="file" name="file">
                    </form> 
                    <form action="{{ route('diskusi.filter') }}" method="get">
                        <select name="kategori">
                            <option value="">Semua Kategori</option>
                            <option value="kategori1">Kategori 1</option>
                            <option value="kategori2">Kategori 2</option>
                            <!-- Tambahkan lebih banyak kategori sesuai kebutuhan -->
                        </select>
                        <input type="submit" value="Terapkan Filter!" class="btn btn-primary"  style="margin-right: 10px;">
                        <input type="submit" value="Filter">
                    </form>
                       
                </div>
            </div>

            @foreach ($diskusi as $diskus)
            <div class="card my-4 bg-white">
                <div class="card-body">
                    <h2 class="text-xl font-bold">{{ $diskus->user->name}}</h2>
                    <p> {{ $diskus->content }} </p>
                    <div style="max-height: 480px; overflow: hidden;">
                        @if($diskus->file)
                        @if(in_array(pathinfo($diskus->file, PATHINFO_EXTENSION), ['jpeg', 'png', 'jpg', 'gif']))
                            <img src="{{ asset('storage/'. $diskus->file) }}" alt="Diskusi File" style="max-width: 50%; height: auto; border-radius: 10px;">
                        @elseif(in_array(pathinfo($diskus->file, PATHINFO_EXTENSION), ['mp4', 'avi', 'mov']))
                            <video controls width="560">
                                <source src="{{ asset('storage/'. $diskus->file) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <a href="{{ asset('storage/'. $diskus->file) }}" target="_blank">Download File</a>
                        @endif
                    @else
                        <p></p>
                    @endif
                        <p>Kategori: {{ $diskus->kategori ?? 'Tidak ada kategori' }} </p>
                        
                </div>
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
