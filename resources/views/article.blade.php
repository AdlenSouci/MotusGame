<x-app-layout>

    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <?php $stock_article = array_sum(array_column($article->tailles->toArray(), 'stock')); ?>
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ asset('img/' . $article['img']) }}" alt="..." /></div>
                <div class="col-md-6">

                    <h1 class="display-5 fw-bolder">
                        <?= $article['modele'] ?>
                    </h1>
                    <div class="fs-5 mb-5">
                        <h5 class="fw-bolder">
                            <?= $article['prix_public'] ?>
                        </h5>
                        <span>
                            <?= $article['prix'] ?>
                        </span>
                    </div>
                    <p class="lead">
                        <?= $article['description'] ?>
                    </p>

                    <br> <br>
                    <div class="d-flex align-items-center">
                        <?= $stock_article > 0 ? '<span class="badge bg-success me-3 stock-badge ">En stock</span>' : '<span class="badge bg-danger me-3 stock-badge">Rupture de stock</span>' ?>
                        <div class="d-flex align-items-center me-3">
                            <label for="pointure" class="me-1">Pointure:</label>
                            <select id="pointure" name="pointure" class="custom-select-2 rounded">
                                <option value=""></option>
                                @foreach($article->tailles as $taille)
                                @if ($taille->stock > 0)
                                <option value="{{ $taille->taille }}">{{ $taille->taille }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex align-items-center me-3">
                            <label for="quantite" class="me-1">Qté:</label>
                            <input type="number" name="quantite" class="form-control-2 rounded" value="1" min="1" max="10">
                        </div>
                        @if($stock_article > 0)
                        <button class="btn btn-outline-dark ajouter_au_panier custom-button">Ajouter au panier</button>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">produit populaire</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">


                <div class="col mb-5">
                    <div class="card h-100">


                        <img class="card-img-top" src="{{  asset('img/sb.webp') }}" alt="..." />

                        <div class="card-body p-4">
                            <div class="text-center">

                                <h5 class="fw-bolder">Sneakers en promotion</h5>

                                <span class="text-muted text-decoration-line-through">$150.00</span>
                                $125.00
                            </div>
                        </div>

                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">

                            <?= $stock_article > 0 ? '<span class="badge bg-success">En stock</span>' : '<span class="badge bg-danger">Rupture de stock</span>' ?>
                            <div class="d-flex align-items-center justify-content-center mt-3">
                                <div class="me-3 d-flex align-items-center">
                                    <i class="fas fa-shoe-prints me-1"></i>
                                    <select id="pointure" name="pointure" class="form-select custom-input-small rounded">
                                        <option value=""></option>
                                        @foreach($article->tailles as $taille)
                                        @if ($taille->stock > 0)
                                        <option value="{{ $taille->taille }}">{{ $taille->taille }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex align-items-center me-3">
                                    <i class="fas fa-sort-amount-up me-1"></i>
                                    <input type="number" name="quantite" class="form-control custom-input-small-2 rounded"  value="1" min="1" max="10">
                                </div>
                                @if($stock_article > 0)
                                <button class="btn btn-outline-dark ajouter_au_panier custom-button">
                                    <i class="fas fa-cart-plus me-1"></i>
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">

                        <img class="card-img-top" src="{{ asset('img/valentine.webp') }}" alt="..." />

                        <div class="card-body p-4">
                            <div class="text-center">

                                <h3>Item populaire</h3>
                                <h5>
                                    dunk low valentine day
                                </h5>

                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>

                                    $160.00
                                </div>


                            </div>
                        </div>

                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">

                            <?= $stock_article > 0 ? '<span class="badge bg-success">En stock</span>' : '<span class="badge bg-danger">Rupture de stock</span>' ?>
                            <div class="d-flex align-items-center justify-content-center mt-3">
                                <div class="me-3 d-flex align-items-center">
                                    <i class="fas fa-shoe-prints me-1"></i>
                                    <select id="pointure" name="pointure" class="form-select custom-input-small rounded">
                                        <option value=""></option>
                                        @foreach($article->tailles as $taille)
                                        @if ($taille->stock > 0)
                                        <option value="{{ $taille->taille }}">{{ $taille->taille }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex align-items-center me-3">
                                    <i class="fas fa-sort-amount-up me-1"></i>
                                    <input type="number" name="quantite" class="form-control custom-input-small-2 rounded"  value="1" min="1" max="10">
                                </div>
                                @if($stock_article > 0)
                                <button class="btn btn-outline-dark ajouter_au_panier custom-button">
                                    <i class="fas fa-cart-plus me-1"></i>
                                </button>
                                @endif
                            </div>



                        </div>
                    </div>
                </div>
            </div>
    </section>

    <script>
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('ajouter_au_panier')) {
                var articleId = event.target.getAttribute('data-article-id');
                var pointure = event.target.parentElement.querySelector('#pointure').value;
                if (pointure) {
                    $.ajax({
                        url: '{{ route("ajouter_au_panier") }}',
                        type: 'POST',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'article_id': articleId,
                            pointure,
                            'quantite': event.target.parentElement.querySelector('[name="quantite"]').value
                        },
                        success: function(response) {
                            alert(response.message + " " + response.nbitems);
                            document.querySelector('#nbitems').textContent = "panier(" + response.nbitems + ")";
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                } else {
                    alert('Veuillez choisir une pointure');
                }
            }
        });
    </script>
</x-app-layout>