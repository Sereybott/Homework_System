@extends('layout')

@section('content')
<nav class="navbar navbar-expand-sm bg-white navbar-white border fixed-top">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="http://localhost:8000/nara-k_logo.jpg" alt="Avatar Logo" style="width:40px;" class=""> 
            </a>
            <ul class="navbar-nav me-auto" >
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link active" onclick="kadai()">課題</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('completed')}}" class="nav-link">完成</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('overdue')}}" class="nav-link">期限を経過</a>
                </li>
            </ul>
            <ul class="d-flex navbar-nav">
                <li class="dropdown nav-item">
                    <button class="nav-link dropdown-toggle active  " id="dropdownMenuButton2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{Auth::user()->name}}-{{Auth::user()->class}}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{route('setting')}}">設定</a></li>
                        <li>
                            <form action="{{route('logout')}}" method="POST" role="search" class="dropdown-item">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item p-0">ログアウト</button >
                        </li>
                    </ul>
                </li>
            </div>
        </div>
    </div>
</nav>
<div class="d-flex justify-content-center" style="padding-top: 100px">
    <div class="card shadow">
        <div class="card-header bg-primary text-white text-center py-3" style="padding:7em">
            <h2>課題システム</h2>
        </div>
        <div class="card-body py-4">
            <h4 class="card-title text-center">パスワードをリセット</h4>
            <form action="#" >
                <div class="form-floating mb-4 mt-4">
                    <input type="text" class="form-control" id="name" value="ボット" name="name" disabled>
                    <label for="name">名前</label>
                </div>
                <div class="form-floating mb-4 mt-4">
                    <input type="text" class="form-control" id="email" value="i11482@nara.kosen-ac" name="email" disabled>
                    <label for="email">メール</label>
                </div>
                <div class="form-floating mb-4 mt-4">
                    <input type="password" class="form-control" id="old-password" placeholder="Enter Password" name="old-password">
                    <label for="old-password">今のパスワード</label>
                </div>
                <div class="form-floating mb-4 mt-4">
                    <input type="password" class="form-control" id="new-password" placeholder="Enter Password" name="new-password">
                    <label for="new-password">新しいパスワード</label>
                </div>
                <div class="form-floating mb-4 mt-4">
                    <input type="password" class="form-control" id="new-password-confirm" placeholder="Enter Password" name="new-password-confirm">
                    <label for="new-password-confirm">新しいパスワードの確認</label>
                </div>
                <p class="text-center"><button type="submit" class="btn btn-primary px-4 py-2">変更</button></p>
                <p class="text-center mb-0"><a href="/homework" class="card-link text-secondary">ホームページに戻る</a></p>
            </form>
        </div>
    </div>
</div>
    
@endsection