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
                    <a href="{{route('student')}}" class="nav-link active">学生の情報</a>
                </li>
                @endif
            </ul>
            <ul class="d-flex navbar-nav">
                <li class="dropdown nav-item">
                    <button class="nav-link dropdown-toggle" id="dropdownMenuButton2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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

<div class="px-5" style="margin:10%;margin-top:80px;">
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
    <table class="table shadow" >
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">学籍番号</th>
            <th scope="col">名前</th>
            <th scope="col">メール</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            
            <?php $i = 1?>
            @foreach ($students as $student)
                @if(!$student->is_admin)
                <tr>
                    <td scope="col">{{$i++}}</td>
                    <td scope="col">{{$student->stu_id}}</td>
                    <td scope="col">{{$student->name}}</td>
                    <td scope="col">{{$student->email}}</td>
                    <td scope="col">
                        <button class="btn btn-warning px-4" type="button" data-bs-toggle="modal" data-bs-target="#myModal">更新</button>
                        <div class="modal" id="myModal">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                          
                                <!-- Modal Header -->
                                <div class="modal-header">
                                  <h4 class="modal-title">情報の更新</h4>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                          
                                <!-- Modal body -->
                                <form method="POST" action="{{route('edit_student')}}">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="{{$student->id}}">
                                        <div class="form-floating mb-4 mt-4">
                                            <input type="text" class="form-control" id="id" value="{{$student->stu_id}}" name="stu_id">
                                            <label for="stu_id">学籍番号</label>
                                        </div>
                                        <div class="form-floating mb-4 mt-4">
                                            <input type="text" class="form-control" id="name" value="{{$student->name}}" name="name">
                                            <label for="name">名前</label>
                                        </div>
                                        <div class="form-floating mb-4 mt-4">
                                            <input type="text" class="form-control" id="email" value="{{$student->email}}" name="email">
                                            <label for="email">メール</label>
                                        </div>
                                        <div class="form-floating mb-4 mt-4">
                                            <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
                                            <label for="password">新しいパスワード</label>
                                        </div>
                                        <div class="form-floating mb-4 mt-4">
                                            <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password_confirm">
                                            <label for="password_confirm">新しいパスワード確認</label>
                                        </div>
                                    </div>
                            
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">保存</button>
                                    </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          
                    </td>
                    <td scope="col">
                        <form action="{{route('delete_student')}}" method="POST" role="search" >
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{$student->id}}">
                            <button class="btn btn-danger px-4" onclick="showDelete()" type="submit">消す</button>
                        </form>
                    </td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
<script>
    function showDelete(){
        if (!confirm("本当に消す？？？")) {
            event.preventDefault();
        } 
    }
</script>
    
@endsection