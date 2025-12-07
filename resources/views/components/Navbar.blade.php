<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

    <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand text-white" href="{{ route('Home') }}">
            <i class="bi bi-house-door-fill"></i>
        </a>

        <!-- Mobile toggle button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation links -->
        <div class="collapse navbar-collapse" id="navbarNav">

            <!-- Left side links -->
            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link text-white" @if(request()->routeIs('article.index')) aria-current="page" @endif
                        href="{{ route('article.index') }}">Tutti gli Articoli
                    </a>
                </li>

                <!-- Only visible to authenticated users -->
                @auth
                    <li class="nav-item">
                        <a class="nav-link text-white" @if(request()->routeIs('article.create')) aria-current="page" @endif
                           href="{{ route('article.create') }}">Crea Articolo
                        </a>
                    </li>
                @endauth

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="categoryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-list"></i> Categorie
                    </a>
                    <ul class="dropdown-menu">
                        @foreach($categories as $category)
                            <li>
                                <a class="dropdown-item" @if(request()->is('articles/category/' . $category->id)) aria-current="page" @endif
                                    href="{{ route('article.byCategory', ['category' => $category->id]) }}">{{ $category->name }}
                                </a>
                            </li>
                            <!-- Stiamo utilizzando !$loop->last per inserire il divisore del dropdown in ogni iterazione del ciclo tranne l’ultima. -->
                            @if(!$loop->last)
                                <hr class="dropdown-divider">
                            @endif
                        @endforeach
                    </ul>
                </li>

            </ul>


            
            <!-- Right side authentication -->
            <ul class="navbar-nav">
                @auth
                    <!-- User logged in -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" @if(request()->routeIs('dashboard')) aria-current="page" @endif
                                    href="{{ route('dashboard') }}">
                                    <i class="bi bi-speedometer2"></i> Dashboard
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            @if(Auth::user()->is_revisor)
                                <li>
                                    <a class="dropdown-item position-relative" @if(request()->routeIs('revisor.index')) aria-current="page" @endif
                                        href="{{ route('revisor.index') }}">
                                        <i class="bi bi-check-circle"></i> Revisione Articoli
                                        <!-- Badge per il conteggio degli articoli da revisionare -->
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">{{ App\Models\Article::toBeRevisedCount() }}</span>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                            @endif
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <!-- User not logged in -->
                    <li class="nav-item">
                        <a class="nav-link text-white" @if(request()->routeIs('login')) aria-current="page" @endif
                            href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" @if(request()->routeIs('register')) aria-current="page" @endif
                            href="{{ route('register') }}">
                            <i class="bi bi-person-plus"></i> Registrati
                        </a>
                    </li>
                @endauth

                <form action="{{ route('article.search') }}" method="GET" class="d-flex ms-auto" role="search">
                    <!-- Per far sì che Scout funzioni, il name associato all’input deve essere necessariamente query -->
                    <input type="search" name="query" class="form-control me-2" placeholder="Cerca articoli..." aria-label="Search">
                    <button type="submit" class="btn btn-outline-info">Cerca</button>
                </form>
            </ul>
        </div>
    </div>

</nav>