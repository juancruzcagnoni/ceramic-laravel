<div class="container section_padding">
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Diapositivas -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-md-4 carousel-img-container">
                        <img src="{{ asset('img/carousel/carrousel1.png') }}" alt="Imagen 1" class="d-block w-100">
                    </div>
                    <div class="col-md-4 carousel-img-container">
                        <img src="{{ asset('img/carousel/carrousel2.png') }}" alt="Imagen 2" class="d-block w-100">
                    </div>
                    <div class="col-md-4 carousel-img-container">
                        <img src="{{ asset('img/carousel/carrousel3.png') }}" alt="Imagen 3" class="d-block w-100">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-md-4 carousel-img-container">
                        <img src="{{ asset('img/carousel/carrousel4.png') }}" alt="Imagen 4" class="d-block w-100">
                    </div>
                    <div class="col-md-4 carousel-img-container">
                        <img src="{{ asset('img/carousel/carrousel5.png') }}" alt="Imagen 5" class="d-block w-100">
                    </div>
                    <div class="col-md-4 carousel-img-container">
                        <img src="{{ asset('img/carousel/carrousel6.png') }}" alt="Imagen 6" class="d-block w-100">
                    </div>
                </div>
            </div>
        </div>

        <!-- Controles del carrusel -->
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>