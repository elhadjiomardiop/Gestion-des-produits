<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">
                <i class="fas fa-tachometer-alt me-2"></i>Tableau de bord
            </h1>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="card-title">Total Produits</h5>
                            <h2 class="mb-0">{{ $totalProducts }}</h2>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-box fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Répartition par catégorie</h5>
                </div>
                <div class="card-body">
                    @if($productsByCategory->count() > 0)
                        <div class="row">
                            @foreach($productsByCategory as $category)
                                <div class="col-md-4 mb-3">
                                    <div class="card border-left-primary">
                                        <div class="card-body">
                                            <h6 class="card-title">{{ $category->category_name ?? 'Sans catégorie' }}</h6>
                                            <p class="card-text">{{ $category->count }} produit(s)</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted">Aucun produit trouvé.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Produits récents</h5>
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-eye me-1"></i>Voir tous
                    </a>
                </div>
                <div class="card-body">
                    @if($recentProducts->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Nom</th>
                                        <th>Prix</th>
                                        <th>Catégorie</th>
                                        <th>Date création</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentProducts as $product)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/' . $product->image_path) }}" 
                                                     alt="{{ $product->name }}" 
                                                     class="img-thumbnail" 
                                                     style="width: 50px; height: 50px; object-fit: cover;">
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ number_format($product->price, 2) }} €</td>
                                            <td>{{ $product->category->name ?? 'Sans catégorie' }}</td>
                                            <td>{{ $product->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <a href="{{ route('products.show', $product) }}" 
                                                   class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted">Aucun produit trouvé. <a href="{{ route('products.create') }}">Créer votre premier produit</a></p>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
