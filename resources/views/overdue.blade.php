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
                    <a href="{{route('home')}}" class="nav-link" onclick="kadai()">課題</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('completed')}}" class="nav-link">完成</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('overdue')}}" class="nav-link active">期限を経過</a>
                </li>
            </ul>
            <ul class="d-flex navbar-nav">
                <li class="dropdown nav-item">
                    <button class="nav-link dropdown-toggle" id="dropdownMenuButton2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
<div class="row mx-5 row-cols-1 row-cols-md-2 row-cols-lg-3" style="margin-top:100px">
    @foreach($homeworks as $homework)
        <?php 
            $student_num = 43;
            $date1=date_create(date("Y-m-d"));
            $date2=date_create($homework['deadline']);
            $diff=date_diff($date1,$date2);
        ?>
        @if(strtotime($homework['deadline'])<strtotime(date("Y-m-d")))
        <div class="col px-5 my-2">
            <div class="card shadow mb-5 p-0">
                
                <div class="card-header bg-secondary text-white text-center py-3"><h3 class="my-0">{{$homework['deadline']}}</h3></div>
                
                <div class="card-body px-4 py-4">
                    
                    <p class="card-text fw-bold">{{$homework['subject']}}</p>
                    <p class="card-text">{{$homework['description']}}</p>
                    @if($homework['isDone'])
                    <p class="card-text">{{$homework['date-done']}}に終わった</p>
                    @else
                    <p class="card-text">しなかった</p>
                    @endif
                    <div class="progress my-4">
                        <div class="progress-bar bg-secondary" style={{"width:".($homework['done']*100/$student_num)."%"}}></div>
                    </div>
                    <p class="text-center m-0"><a class="btn btn-secondary px-4" onclick="showConfirmation()" href="#" type="button">クリア</a></p>
                </div>
            </div>
        </div>
        @endif
    @endforeach
</div>
<script>
    function showConfirmation() {
      if (!confirm("本当に終わった？？？")) {
        event.preventDefault();
      } 
    }
</script>
@endsection