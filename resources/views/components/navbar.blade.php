<div>
	<nav id="nav">
        <ul class="main-menu nav navbar-nav navbar-right">
            <form id="logout-form" method="POST" action="{{url('logout')}}" style="dispaly:none" >
                @csrf
           
            </form> 
            <li><a href="index.html">{{__('web.home')}}</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{__('web.categories')}} <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    @foreach ($cats as $cat )
                        
                    
                  <li><a href="{{url("/categoies/show/{$cat->id}")}}">   {{$cat->name()}} 
               {{--   i get cat->name in Cat Module nad cat Module get language in Lang page/web  --}}
                    @if(App::getLocale()=="en")
                {{json_decode($cat->name)->en}} 
                    @else
                 {{json_decode($cat->name)->ar}}
                    @endif
               </a> </li>
                    {{-- i set App::getLocale to cheak language select and covert selected
                        this way was too hight and wanna alote of time
                        i use this in module --}}

                    {{-- json_decode to convert json text to string  --}}
                    {{-- if you set true in name you will get array /flase return object 
                        i call object array is($cat->name,true)->['en'] --}}
               @endforeach
                </ul>
            </li>
            <li><a href="{{url('contact')}}">{{__('web.contact')}} </a></li>
            {{-- to call stacti  lange in blade --}}
            @guest
                    {{-- is not login --}}

            <li><a href="{{url('login')}}">{{__('web.sign in')}}</a></li>
        <li><a href="{{url('register')}}">{{__('web.sign up')}}</a></li>
            @endguest
        {{-- is login --}}
            @auth 
            <li><a id="logout-link" href="{{url('logout')}}">{{__('web.signout')}}</a></li>
            @endauth

            @if (App::getLocale()=="ar") 
            {{-- if select ar buttom link hide ar and show en else  ar --}}
                
            
            <li><a href="{{url('lang/set/en')}}">EN</a></li>
            @else
            <li><a href="{{url('lang/set/ar')}}">ع</a></li>
            @endif
        
    </nav>
</div>