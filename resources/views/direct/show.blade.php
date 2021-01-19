@extends('layouts.app')
@section('content')
    <style>
        .chat {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .chat li {
            margin-bottom: 40px;
            padding-bottom: 5px;
            /* border-bottom: 1px dotted #B3A9A9; */
            margin-top: 10px;
            width: 80%;
        }


        .chat li .chat-body p {
            margin: 0;
            /* color: #777777; */
        }


        .chat-care {
            overflow-y: scroll;
        }

        .chat-care .chat-img {
            width: 50px;
            height: 50px;
        }

        .chat-care .img-circle {
            border-radius: 50%;
        }

        .chat-care .chat-img {
            display: inline-block;
        }

        .chat-care .chat-body {
            display: inline-block;
            max-width: 100%;
            border-radius: 12.5px;
            padding: 30px;
        }

        .chat-care .chat-body strong {
            color: #0169DA;
        }

        .chat-care .admin {
            text-align: right;
            float: right;
        }

        .chat-care .admin p {
            text-align: left;
        }

        .chat-care .agent {
            text-align: left;
            float: left;
        }

        .chat-care .left {
            float: left;
        }

        .chat-care .right {
            float: right;
        }

        .clearfix {
            clear: both;
        }


        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar-thumb {
            box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
            background-color: #555;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card-header text-center">
                    <span>Direct</span>
                </div>
                <div class="card-body chat-care">
                    <ul class="chat">
                        @foreach($messages as $message)
                            @if($message->sender_id ==Auth::id())
                                <li class="admin clearfix">
                                    <div class="chat-body clearfix" style="background-color: #5cd08d">
                                        <div class="header clearfix">
                                            <small class="left text-muted"><span
                                                    class="glyphicon glyphicon-time"></span>
                                                {{$message->created_at->diffForHumans()}}</small>
                                            <strong class="right primary-font">{{$message->sender->user_name}}</strong>
                                        </div>
                                        <p>
                                            {{$message->body}}
                                        </p>
                                    </div>
                                </li>
                            @else
                                <li class="agent clearfix">
                            <span class="chat-img left clearfix mx-2">
                                <img src="{{is_link($message->sender->image->path) ? $message->sender->image->path : asset(str_replace('public','storage' ,$message->sender->image->path))}}" alt="Agent" class="img-circle" style="width: 50px ;height: 50px"/>
                            </span>
                                    <div class="chat-body clearfix" style="background-color: #4dc0b5">
                                        <div class="header clearfix">
                                            <strong class="primary-font">{{$message->sender->user_name}}</strong> <small
                                                class="right text-muted">
                                                <span class="glyphicon glyphicon-time"></span>{{$message->created_at->diffForHumans()}}</small>
                                        </div>
                                        <p>
                                            {{$message->body}}
                                        </p>
                                    </div>

                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer">
                    <div class="input-group">
                        <form class="col-md-12" method="post" action="{{ route('send.message',$id) }}">
                            @csrf
                            <div class="form-group">
                                <input id="btn-input" type="text" name="body" class="form-control input-sm" />
                            </div>
                            <span class="input-group-btn">
                                <button class="btn btn-primary" id="btn-chat">Send</button>
                                </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('.card-body').scrollTop(1000000);
    </script>
@endsection
