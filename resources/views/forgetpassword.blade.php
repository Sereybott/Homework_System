@extends('loginlayout')

@section('content')
{{$isLogin = false}}
<div class="d-flex justify-content-center align-items-center" style="height:100%">
    <div class="card shadow">
        <div class="card-header bg-primary text-white text-center   py-3" style="padding:7em">
            <h2>課題システム</h2>
        </div>
        <div class="card-body py-4">
            <h4 class="card-title text-center">パスワードをリセット</h4>
            <form action="#" >
                <div class="form-floating mb-4 mt-4">
                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
                <label for="email">メール</label>
                </div>
                <p class="text-center"><button type="submit" class="btn btn-primary px-4 py-2">メールを送る</button></p>
            </form>
            <p class="card-item text-center mb-0 mt-3"><a href="{{route('login')}}" class="card-link text-secondary">ログインページに戻る</a></p>
        </div>
    </div>
</div>
    
@endsection