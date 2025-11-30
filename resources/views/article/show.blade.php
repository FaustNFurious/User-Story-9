<x-Layout>


    <div class="container-fluid">

        <div class="row justify-content-center align-items-center my-5">
            <div class="col-12 text-center">
                <h3 class="display-2 text-light">Dettagli di: {{ $article->title }}</h3>
            </div>
        </div>

        <div class="row justify-content-center align-items-center my-5">
            <div class="col-12 col-md-6">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/400/300" class="d-block w-100 rounded shadow" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/400/301" class="d-block w-100 rounded shadow" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/400/302" class="d-block w-100 rounded shadow" alt="...">
                        </div>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="row justify-content-center align-items-center my-5">
            <div class="col-12 col-md-8 text-center text-light">
                <h4 class="display-5">Titolo: {{ $article->title }}</h4>
                <h6>Prezzo: {{ $article->price }} €</h6>
                <p class="mt-4">Descrizione: {{ $article->description }}</p>
            </div>
        </div>

    </div>


</x-Layout>