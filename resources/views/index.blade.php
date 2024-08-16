@extends('layouts.dashboard.index')
@section('main-content')


<div class ="block mx-auto my-12 p-8 bg-white" >

    <h1 class="text-center">BIENVENIDO</h1>
    <div style=" width: 96%; max-width: 960px; margin: 0 auto;" >
        <!-- <img src="{{asset('images/colca.jpg')}}" alt="" style=" width:100%; height: auto;" width="960" height="640"> -->
                <div id="loginCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/images/portada-1.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/images/defensoria-1.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/images/poratada-3.jpg" class="d-block w-100" alt="...">
                            </div>
                    </div>
                    <h1 class="text-center">
                        CORAZON DEL VALLE UNIDAD DE DESARROLLO COLCAPIRHUA
                    </h1>
                </div>
    </div>

</div>
@endsection
