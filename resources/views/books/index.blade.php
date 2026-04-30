<x-app-layout>
    <x-slot name="header">
        
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">読書アプリ</h2>
    </x-slot>
    <div class="py-8 max-w-8xl mx-auto px-4">
        @if(session('success'))
        <div class="mb-4 p-s bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <div class="mt-4 text-center">
        <a href="{{ route('books.create') }}" class="bg-blue-500 text-white px-4 py-2 ml-4 mb-6 rounded hover:bg-blue-600">
            + 本を追加
        </a>
    </div>
    <div class="grid gap-4 p-4 md:grid-cols-2 lg:grid-cols-3">
       
        @forelse($books as $book)
        <div class="bg-white p-4   rounded shadow h-full">
        
            <p class="font-bold text-lg"><strong>タイトル:</strong>{{ $book->title}}</p>
            
            <p><strong>著者:</strong>{{ $book->author}}</p>
            <p class="flex items-center gap-2"><strong>ステータス:</strong>
                <span class="px-2 py-1 rounded text-white @if($book->status === 'finished') bg-green-500
                @elseif($book->status === 'reading') bg-blue-500
                @else bg-gray-400 @endif
                ">
                    {{ ['unread' => '未読', 'reading' => '読書中', 'finished' => '読了'][$book->status] }}
                </span>
            </p>
            <p><strong>評価:</strong>
            @for($i = 1; $i <= 5; $i++)
                <span>{{ $i <= $book->rating ? '★' : '☆' }}</span>
            @endfor
            </p>
            <p><strong>メモ:</strong>
            {{ $book->memo}}
            </p>
            <p><strong>開始日時:</strong>{{ $book->started_at}}
            </p>
            <p><strong>終了日時:</strong>{{ $book->finished_at}}</p>
            <div class="flex gap-4 mt-2">
                <a href="{{ route('books.edit',$book) }}" class="text-blue-600">編集</a>
                <form method="POST" action="{{ route('books.destroy',$book) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600" onclick="return confirm('削除しますか？')">削除</button>
                </form>
            </div>
        </div>
       
    
     @empty
        <p class="text-gray-500 text-center col-span-3">まだ本が登録されていません</p>
        
    @endforelse
    </div>
    
    <div class="mt-4">
        {{ $books->links() }}
    </div>
    </x-app-layout>