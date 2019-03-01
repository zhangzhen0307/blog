<nav class=" navbar bg-light navbar-expand-lg">
        <div class="container">
        <a href="{{route('home')}}">首页</a>
            <ul class=" navbar-nav">
                @if(Auth::check())
                    <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle" id="dropdown-toggle1" data-toggle="dropdown">{{Auth::user()->name}}</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown-toggle1">
                        <a href="{{route('users.show',[Auth::user()])}}" class="dropdown-item">个人中心</a>
                        <a href="{{route('users.edit',[Auth::user()])}}" class="dropdown-item">编辑资料</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <form action="{{route('logout')}}"method="post">
                                {{ csrf_field() }}
                                {{method_field('delete')}}
                                <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                            </form>
                        </a>
                    </div>
                    </li>
                @else
                    <li class=" nav-item"><a class=" nav-link" href="/">登录</a></li>
                    <li class=" nav-item"><a class=" nav-link" href="{{route('help')}}">帮助</a></li>
                @endif
            </ul>
        </div>
    </nav>