@extends('layout')

@section('content')
<nav class="navbar navbar-expand-sm bg-white navbar-white border fixed-top">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{URL::asset('/nara-k_logo.jpg')}}" alt="Avatar Logo" style="width:40px;" class=""> 
            </a>
            <ul class="navbar-nav me-auto" >
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link" onclick="kadai()">課題</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('completed')}}" class="nav-link">完成</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('overdue')}}" class="nav-link">期限を経過</a>
                </li>
                @if(Auth::user()->is_admin)
                <li class="nav-item">
                    <a href="{{route('student')}}" class="nav-link">学生の情報</a>
                </li>
                @endif
            </ul>
            <ul class="d-flex navbar-nav">
                <li class="dropdown nav-item">
                    <button class="nav-link dropdown-toggle active  " id="dropdownMenuButton2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php use App\Models\kurasu;?>
                        {{Auth::user()->name}}-{{kurasu::where('id',Auth::user()->class)->first()['name']}}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{route('setting')}}">設定</a></li>
                        @if(Auth::user()->is_admin )
                            <li><a class="dropdown-item" href="{{route('addhomework')}}">課題の追加</a></li>
                            <li><a class="dropdown-item" href="{{route('addstudent')}}">学生の追加</a></li>
                        @endif
                        <li>
                            <form action="{{route('logout')}}" method="POST" role="search" class="dropdown-item">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item p-0">ログアウト</button >
                            </form>
                        </li>
                    </ul>
                </li>
            </div>
        </div>
    </div>
</nav>
<div class="d-flex justify-content-center" style="padding-top: 100px; padding-bottom: 50px">
    <div class="card shadow">
        <div class="card-header bg-primary text-white text-center py-3" style="padding:7em">
            <h2>課題システム</h2>
        </div>
        <div class="card-body py-4">
            <h4 class="card-title text-center">設定</h4>
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('error')}}
                </div>
            @endif
            <form action="{{route('setting')}}" method="POST">
                @csrf
                <div class="form-floating mb-4 mt-4">
                    @if(Auth::user()->is_admin)
                    <input type="text" class="form-control" id="id" value="{{Auth::user()->stu_id}}" name="stu_id">
                    @else
                    <input type="text" class="form-control" id="id" value="{{Auth::user()->stu_id}}" name="stu_id" readonly>
                    @endif
                    <label for="stu_id">学籍番号</label>
                </div>
                <div class="form-floating mb-4 mt-4">
                    @if(Auth::user()->is_admin)
                    <input type="text" class="form-control" id="name" value="{{Auth::user()->name}}" name="name">
                    @else
                    <input type="text" class="form-control" id="name" value="{{Auth::user()->name}}" name="name" readonly>
                    @endif
                    <label for="name">名前</label>
                </div>
                <div class="form-floating mb-4 mt-4">
                    @if(Auth::user()->is_admin)
                    <input type="text" class="form-control" id="email" value="{{Auth::user()->email}}" name="email">
                    @else
                    <input type="text" class="form-control" id="email" value="{{Auth::user()->email}}" name="email" readonly>
                    @endif
                    <label for="email">メール</label>
                </div>
                <div class="form-floating mb-4 mt-4">
                    <input type="password" class="form-control" id="old-password" placeholder="Enter Password" name="old_password">
                    <label for="old_password">今のパスワード</label>
                </div>
                <div class="form-floating mb-4 mt-4">
                    <input type="password" class="form-control" id="new-password" placeholder="Enter Password" name="new_password">
                    <label for="new_password">新しいパスワード</label>
                </div>
                <div class="form-floating mb-4 mt-4">
                    <input type="password" class="form-control" id="new-password-confirm" placeholder="Enter Password" name="new_password_confirm">
                    <label for="new_password_confirm">新しいパスワードの確認</label>
                </div>
                <p class="text-center"><button type="submit" class="btn btn-primary px-4 py-2">更新</button></p>
                <p class="text-center mb-0"><a href="{{route('home')}}" class="card-link text-secondary">ホームページに戻る</a></p>
            </form>
        </div>
    </div>
</div>
    
@endsection