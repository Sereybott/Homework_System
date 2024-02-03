@extends('loginlayout')

@section('content')
{{$isLogin = false}}
<nav class="navbar navbar-expand-sm bg-white navbar-white border fixed-top">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <a class="navbar-brand">
                <img src="http://localhost:8000/nara-k_logo.jpg" alt="Avatar Logo" style="width:40px;" class=""> 
            </a>
            <p class="navbar-text m-0">奈良高専</p>
        </div>
    </div>
</nav>
<div class="d-flex justify-content-center align-items-center" style="height:100%">
    <div class="card shadow">
        <div class="card-header bg-primary text-white text-center   py-3" style="padding:7em">
            <h2>課題システム</h2>
        </div>
        <div class="card-body py-4">
            <h4 class="card-title text-center">ログイン</h4>
            @if(Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('error')}}
                </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-floating mb-4 mt-4">
                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
                <label for="email">メール</label>
                </div>
                <div class="form-floating mt-4 mb-4">
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                <label for="pwd">パスワード</label>
                </div>
                <p class="text-center"><button type="submit" class="btn btn-primary px-4 py-2">ログイン</button></p>
            </form>
            {{-- <p class="card-item text-center mb-0 mt-3"><a href="{{route('forget')}}" class="card-link text-secondary">パスワードを忘れた</a></p> --}}
        
        </div>
    </div>
</div>
@endsection