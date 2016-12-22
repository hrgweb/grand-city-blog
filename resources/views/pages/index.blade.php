@extends('layouts.app')

@section ('title')
    <title>Welcome to Grand City Hotel</title>
@endsection

@section ('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
@endsection

@section ('content')
	<header>
        <div class="row">
            <div class="header-left col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <h2><a href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}"></a></h2>
            </div>

            <div class="header-right col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <ul class="main-nav list-inline">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/') }}">Hotel</a></li>
                    <li><a href="{{ url('/') }}">Blogs</a></li>
                    <li><a href="{{ url('/') }}">Contact Us</a></li>
                </ul>
                <ul class="social-nav list-inline pull-right">
                    <li><a href="#" class="fb"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="google"><i class="fa fa-google-plus-circle" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </header>
    <!-- end of header -->

    <section class="Banner">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <img src="{{ asset('img/banner.jpg') }}" class="img-responsive" alt="Banner Slide">
            </div>
        </div>
    </section>
    <!-- end of banner -->

    <main>
        <section class="quote">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <blockquote>
                        ” Grand City Hotel is perfectly located at the heart of the city, and can offer the best comforts to the well-travelled businessman as well as the fun-loving Kagay-anons and discriminating tourists alike. “
                    </blockquote>
                </div>
            </div>
        </section>
        <!-- end of quote -->

        <section class="Location">
            <div class="row">
                <h2 class="text-center">Our Location</h2>
            </div>
            <div class="row">
                @foreach ($locations as $location)
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <h3>{{ $location->location }}</h3>
                        <img src="{{ asset('img/cebu2.jpg') }}" class="img-responsive" alt="cebu city">
                        <p><em>{{ ucwords($location->title) }}</em></p>
                        <p>{{ $location->description }}</p>
                        <a href="{{ url('location', ['cebu']) }}" role="button" class="btn btn-default">Read More</a>
                    </div>
                @endforeach

{{-- 
                 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <h3>Cagayan de Oro City</h3>
                    <img src="{{ asset('img/cdo2.jpg') }}" class="img-responsive" alt="cdoc city">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas quidem saepe doloremque repellat minima quod totam ducimus maiores vero.</p>
                    <a href="#" role="button" class="btn btn-default">Read More</a>
                </div> --}}
            </div>
        </section>
        <!-- end of location -->

        <section class="Food">
            <div class="row">
                <h2  class="text-center">Our Foods</h2>
            </div>

            <div class="row">
                <div class="Food__item col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <h3>Fried Chicken</h3>
                    <img src="{{ asset('img/food.jpg') }}" class="img-responsive" alt="Fried Chicken">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut.</p>
                    <a href="#" role="button" class="btn btn-default">Read More</a>
                </div>

                <div class="Food__item col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <h3>TOMATO SALAD</h3>
                    <img src="{{ asset('img/food2.jpg') }}" class="img-responsive" alt="TOMATO SALAD">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut.</p>
                    <a href="#" role="button" class="btn btn-default">Read More</a>
                </div>

                <div class="Food__item col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <h3>PIZZA</h3>
                    <img src="{{ asset('img/food3.jpg') }}" class="img-responsive" alt="PIZZA">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut.</p>
                    <a href="#" role="button" class="btn btn-default">Read More</a>
                </div>

                <div class="Food__item col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <h3>HAMBURGER</h3>
                    <img src="{{ asset('img/food4.jpg') }}" class="img-responsive" alt="chicken">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut.</p>
                    <a href="#" role="button" class="btn btn-default">Read More</a>
                </div>
            </div>

            <div class="row">
                <a href="#" role="button" class="btn btn-default btn-block" style="margin-top: 3em;">View All</a>
            </div>
        </section> 
        {{-- end of Food --}}

        <section class="Tour">
            <div class="row">
                <h2  class="text-center">TRAVEL TOURS</h2>
            </div>

            <div class="row">
                <div class="Food__item col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <h3>Fried Chicken</h3>
                    <img src="{{ asset('img/travel.jpg') }}" class="img-responsive" alt="Fried Chicken">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut.</p>
                    <a href="#" role="button" class="btn btn-default">Read More</a>
                </div>

                <div class="Food__item col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <h3>Fried Chicken</h3>
                    <img src="{{ asset('img/travel2.jpg') }}" class="img-responsive" alt="Fried Chicken">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut.</p>
                    <a href="#" role="button" class="btn btn-default">Read More</a>
                </div>

                <div class="Food__item col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <h3>Fried Chicken</h3>
                    <img src="{{ asset('img/travel3.jpg') }}" class="img-responsive" alt="Fried Chicken">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut.</p>
                    <a href="#" role="button" class="btn btn-default">Read More</a>
                </div>

                <div class="Food__item col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <h3>Fried Chicken</h3>
                    <img src="{{ asset('img/travel4.jpg') }}" class="img-responsive" alt="Fried Chicken">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut.</p>
                    <a href="#" role="button" class="btn btn-default">Read More</a>
                </div>
            </div>

            <div class="row">
                <a href="#" role="button" class="btn btn-default btn-block" style="margin-top: 3em;">View All</a>
            </div>
        </section>
        {{-- end of Location --}}
    </main>
    {{-- end of main --}}

    <footer>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="footer-left">
                    <p>&copy; Copyright Grand City Hotel 2016. Created and Maintained by <em>RDTI Soft Dev Inc</em>.</p>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="footer-left">
                    
                </div>
            </div>
        </div>
    </footer>
@endsection
