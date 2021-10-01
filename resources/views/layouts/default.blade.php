<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')

    @yield('head')
</head>
<body>

@include('includes.navbar')

<div class="container">
    <div class="row">

        <div class="col-md-8">
            @include('includes.header')

            <ul class="breadcrumb">
                
                <p>top 10 bezochte handleidingen </p>
                @yield('breadcrumb')
                <?php

                use App\Models\Brand;
                use App\Models\Type;


                $someUsers = Brand::all()->take(10);
                $type = Type::findOrFail($type_id);
                ?>

                @foreach($someUsers as $user)                   
                    <a href="/{{ $brand->id }}/{{ $brand->name_url_encoded }}/{{ $user->id }}/{{ $user->name_url_encoded }}/">{{$type->name}}</a>
                @endforeach
                
            </ul>

            

            <div class="brands">
                @if ( isset($_GET['q']) )
                    @include('includes.search_results')
                @else
                    @yield('content')
                @endif
            </div>

            <ul class="breadcrumb">
                <li>
					<a href="/" title="{{ __('misc.home_alt') }}" alt="{{ __('misc.home_alt') }}">{{ __('misc.home') }}</a>
				</li>
                @yield('breadcrumb')
            </ul>

        
            <div class="breadcrumb"> 
                <div class="bottom">
                    @include('includes.footer')
                </div>                                              
            </div>
        </div>

    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>//window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="{{ asset('/js/app.js') }}"></script>

</body>
</html>
