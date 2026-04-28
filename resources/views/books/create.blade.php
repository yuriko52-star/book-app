<x-app-layout>
    <x-slot name="header">
        
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">本を登録</h2>
    </x-slot>

    <div class="mt-6">
        <a href="{{ route('books.index') }}" class="bg-blue-500 text-white px-4 py-2 ml-4 rounded hover:bg-blue-600">
            一覧に戻る
        </a>
    </div>
    <div class="py-8 max-w-2xl mx-auto px-4">
        <div class="bg-white p-4 mx-4 my-6 rounded shadow">
            <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="" class="block mb-1 font-medium">タイトル</label>
                <input type="text" name="title" class="w-full border rounded px-3 py-2" value="{{ old('title') }}">
                <label for="" class="block mb-1 font-medium">著者</label>
                <input type="text" name="author" class="w-full border rounded px-3 py-2" value="{{ old('author') }}">
                <label for="" class="block mb-1 font-medium">ステータス</label>
                
                <select name="status"class="w-full borer rounded px-3 py-2">
                    <option value="">選んでください</option>
                    <option value="unread" {{ old('status')=== 'unread' ? 'selected' : '' }}class="">未読</option>
                    <option value="reading" {{ old('status') === 'reading' ? 'selected' : '' }} class="">読書中</option>
                    <option value="finished" {{ old('status') === 'finished' ? 'selected' : '' }} class="">読了</option>
                </select>
                <label for="" class="block mb-1 font-medium">評価</label>
                <select name="rating" id="" class="w-full borer rounded px-3 py-2">
                    <option value="" class="">未評価</option>
                    @for($i = 1; $i <=5; $i++)
                    <option value="{{$i}}">{{$i}}
                    </option>
                    @endfor
                </select>
                <label for="" class="block mb-1 font-medium">メモ</label>
                <textarea name="memo" class="w-full borer rounded px-3 py-2" value="">{{ old('memo') }}</textarea>
                <!-- <div class="flex space-x-4"> -->
                <label for="" class="block mb-1 font-medium">開始日時</label>
                <input type="date" name="started_at" class="border rounded px-1 py-2" value="{{ old('started_at') }}">
                <label for="" class="block mb-1 font-medium">終了日時</label>
                <input type="date" name="finished_at" class="border rounded px-1 py-2" value="{{ old('finished_at') }}">
                
                <div class="mt-4 text-center">
                    
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">登録</button>
                </div>
                </div>
            </form>
        </div>
        
        
       
    </div>
    </x-app-layout>