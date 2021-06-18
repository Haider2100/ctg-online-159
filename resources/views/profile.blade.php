@extends ('layouts.master')
@section('content')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Profile</h1>

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        </ul>
    </div>

    <div class="row user">
        <div class="col-md-12">
            <div class="profile">
                <div class="info"><img class="user-img" src="{{asset('assets\images\pp1.png')}}">
                    <h4>A H M Kamruzzaman</h4>
                    <p>Developer</p>
                </div>
                <div class="cover-image"></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Timeline</a></li>
                    <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Settings</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
               @foreach($todos as $todo)
                <div class="tab-pane active" id="user-timeline">
                    <div class="timeline-post">
                        <div class="post-media"><a href="#"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"></a>
                            <div class="content">
                                <h5><a href="{{$todo->id}}">{{$todo->task}}</a></h5>
                                <p class="text-muted"><small>{{$todo->created_at.'\\Post By-'.$todo->user_id}}</small></p>
                            </div>
                        </div>
                        <div class="post-content">
                            <p> {{$todo->description}}</p>
                        </div>
                        <ul class="post-utility">
                            <li class="likes"><a href="#"><i class="fa fa-fw fa-lg fa-thumbs-o-up"></i>Like</a></li>
                            <li class="shares"><a href="#"><i class="fa fa-fw fa-lg fa-share"></i>Share</a></li>
                            <li class="comments"><i class="fa fa-fw fa-lg fa-comment-o"></i> 15 Views</li>
                            <li class="comments"><i class="fa fa-fw fa-lg fa-comment-o"></i> 5 Comments</li>
                        </ul>
                    </div>
                    @endforeach

                </div>


                <div class="tab-pane fade" id="user-settings">
                    <div class="tile user-settings">
                        <h4 class="line-head">Settings</h4>
                        <form>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label>First Name</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="col-md-4">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 mb-4">
                                    <label>Email</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-8 mb-4">
                                    <label>Mobile No</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-8 mb-4">
                                    <label>Office Phone</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-8 mb-4">
                                    <label>Home Phone</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="row mb-10">
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
