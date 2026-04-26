<x-app-layout>
    <x-slot name="header">
        
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">読書アプリ</h2>
            
        
        <!--session 用意する -->
    </x-slot>
    <div class="mt-6">
        <a href="" class="bg-blue-500 text-white px-4 py-2 ml-4 rounded hover:bg-blue-600">
            + 本を追加
        </a>
    </div>
    <div class="space-y-4">
        <!-- 後で設定 -->
        {{--@foreach($books as $book)--}}
        <div class="bg-white p-4 mx-4 my-6 rounded shadow">
            <p><strong>タイトル:</strong></p>
            <p><strong>著者:</strong></p>
            <p><strong>ステータス:</strong></p>
            <p><strong>評価:</strong></p>
            <p><strong>メモ:</strong></p>
            <p><strong>開始日時:</strong></p>
            <p><strong>終了日時:</strong></p>
            <div class="flex gap-4 mt-2">
                <a href="" class="text-blue-600">編集</a>
                <form action="" class="">
                    <button type="submit" class="text-red-600">削除</button>
                </form>
            </div>
        </div>
        {{--@endforeach--}}
    </div>
    </x-app-layout>