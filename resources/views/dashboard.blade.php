@extends ('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row" style="margin-top: 50px">
            <div class="col-md-2">
                <img class="card-img-top" style="border-radius: 50%" src="{{(!empty($user->profile_photo_path))?
                                url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg')}}" alt="User Avatar"
                                height="100%" width="100%">
                                <ul class="list-group list-group-flush">
                                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block" style="margin-top:50px; background: #000000; border-radius: 10px;"> @if (session()->get('language')=='ro') Acasă @else Home @endif</a>
                                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block" style="background: #000000; border-radius: 10px;">@if (session()->get('language')=='ro') Editează profilul @else Edit Profile @endif</a>
                                    <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block" style="background: #000000; border-radius: 10px;">@if (session()->get('language')=='ro') Schimbă parola @else Change Password @endif</a>
                                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block" style="border-radius: 10px;">Logout</a>
                                </ul>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-6">
                    <div>
                        <h3 class="text-center"><span class="text-danger">@if (session()->get('language')=='ro') Salut, @else Hi, @endif</span><strong>{{Auth::user()->name}}</strong>!<br>
                        @if (session()->get('language')=='ro') Bine ați venit pe YEKIX, Outlet Nike pentru bărbați @else Welcome to YEKIX - Nike Men Resell Store! @endif</h3>
                        <h4 style="margin-top:30px;"> @if (session()->get('language')=='ro') Știați că: @else Fun fact: @endif</h4><h3><b>@if (session()->get('language')=='ro') Sloganul Nike provine de la un ucigaș @else Nike’s Slogan Originated From a Killer @endif</b></h3>
<span style="font-size: 15px">@if (session()->get('language')=='ro') @else “Just do it” has been a famous slogan that Nike has been using for many years now. @endif
@if (session()->get('language')=='ro')“Just do it” a fost un slogan celebru pe care Nike îl folosește de mulți ani. Dar majoritatea oamenilor probabil nu știau că originile sale provin de la Gary Gilmore, care a fost executat pentru două crime în 1977. Când i s-au cerut ultimele cuvinte înainte de execuție, Gilmore a răspuns pur și simplu: „Hai să o facem”. Dan Wieden, fondatorul agenției de publicitate Wieden+Kennedy, a folosit acest citat ca inspirație pentru a lansa campania „Just Do It” în 1988. Utilizând acea campanie, Nike a reușit să-și crească considerabil cota de piață în America de Nord în următorul deceniu. @else But most people probably did not know that its origins stemmed from Gary Gilmore, who was executed for two murders in 1977. When asked for any final words prior to his execution, Gilmore simply replied, “Let’s do it.” Dan Wieden, the founder of Wieden+Kennedy advertising agency, used this quote as inspiration to launch the “Just Do It” campaign in 1988. Utilizing that campaign, Nike was able to greatly increase its market share in North America over the next decade. @endif</span>
                    </div>
            </div>
        </div>
    <div>
</div>
            
@endsection