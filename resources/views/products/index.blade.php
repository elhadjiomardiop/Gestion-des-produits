<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>
                    <i class="fas fa-box me-2"></i>Mes Produits
                </h1>
                <a href="{{ route('products.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i>Nouveau Produit
                </a>
            </div>
        </div>
    </div>

    <!-- Filtres -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="GET" action="{{ route('products.index') }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="search">Rechercher</label>
                                    <input type="text" 
                                           class="form-control" 
                                           id="search" 
                                           name="search" 
                                           value="{{ request('search') }}" 
                                           placeholder="Nom du produit...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="category">Catégorie</label>
                                    <select class="form-select" id="category" name="category">
                                        <option value="">Toutes les catégories</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" 
                                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>&nbsp;</label>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-outline-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Liste des produits -->
    <div class="row">
        @forelse($products as $product)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $product->image_path) }}" 
                         class="card-img-top" 
                         alt="{{ $product->name }}"
                         style="height: 200px; object-fit: cover;">
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-success fw-bold">{{ number_format($product->price, 2) }} FCFA</p>
                        
                        @if($product->category)
                            <span class="badge bg-secondary mb-2">{{ $product->category->name }}</span>
                        @endif
                        
                        @if($product->details)
                            <p class="card-text flex-grow-1">{{ Str::limit($product->details, 100) }}</p>
                        @endif
                        
                        <div class="mt-auto">
                            <div class="btn-group w-100" role="group">
                                <a href="{{ route('products.show', $product) }}" 
                                   class="btn btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('products.edit', $product) }}" 
                                   class="btn btn-outline-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" 
                                      action="{{ route('products.destroy', $product) }}" 
                                      class="d-inline"
                                      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle me-2"></i>
                    Aucun produit trouvé. 
                    <a href="{{ route('products.create') }}">Créer votre premier produit</a>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($products->hasPages())
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $products->withQueryString()->links() }}
            </div>
        </div>
    @endif
</x-app-layout>
