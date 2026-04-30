<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>読書アプリ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <div class="flex flex-col items-center mt-20">
        <h1 class="text-3xl font-bold mb-4 ">
            読書アプリ
        </h1>
        <p class="mb-6 text-gray-600">
            日頃読んでいる本の記録ができます。
        </p>
        <div class="flex justify-center gap-4">
            <a href="/login" class="bg-blue-500 text-white px-4 py-2 rounded">
                ログイン
            </a>

            <a href="/register" class="bg-gray-300 px-4 py-2 rounded">
                新規登録
            </a>
        </div>
    </div>
</body>
</html>