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
                <li class="dropdown nav-item active">
                    <button class="nav-link dropdown-toggle" id="dropdownMenuButton2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php use App\Models\kurasu;?>
                        {{Auth::user()->name}}-{{kurasu::where('id',Auth::user()->class)->first()['name']}}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{route('setting')}}">設定</a></li>
                        @if(Auth::user()->is_admin )
                            <li><a class="dropdown-item" href="{{route('setting')}}">課題の追加</a></li>
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
<div class="d-flex justify-content-center" style="padding-top: 100px">
    <div class="card shadow">
        <div class="card-header bg-primary text-white text-center py-3" style="padding:7em">
            <h2>課題システム</h2>
        </div>
        <div class="card-body py-4">
            <h4 class="card-title text-center">課題の追加</h4>
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
            <form action="{{route('addhomework')}}" method="POST">
                @csrf
                <div class="form-floating mb-4 mt-4">
                    <input type="hidden" class="form-control" placeholder="クラス" value="{{Auth::user()->class}}" id="class" name="class" readonly>
                    {{-- <label for="class">クラス</label> --}}
                </div>
                <div class="form-floating mb-4 mt-4">
                    <input type="text" class="form-control" placeholder="科目" id="subject" name="subject">
                    <label for="subject">科目</label>
                </div>
                <div class="form-floating mb-4 mt-4">
                    <input type="text" class="form-control" placeholder="内容" id="description" name="description">
                    <label for="description">内容</label>
                </div>
                <div class="form-floating mb-4 mt-4">
                    <input type="date" class="form-control" placeholder="締め切り" id="deadline" name="deadline">
                    <label for="deadline">締め切り</label>
                </div>
                
                <p class="text-center"><button type="submit" class="btn btn-primary px-4 py-2">追加</button></p>
                <p class="text-center mb-0"><a href="{{route('home')}}" class="card-link text-secondary">ホームページに戻る</a></p>
            </form>
        </div>
    </div>
</div>
    
@endsection