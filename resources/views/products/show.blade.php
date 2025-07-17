<x-app-layout>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="fas fa-eye me-2"></i>Détails du produit
                    </h5>
                    <div>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit me-1"></i>Modifier
                        </a>
                        <form method="POST" 
                              action="{{ route('products.destroy', $product) }}" 
                              class="d-inline"
                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash me-1"></i>Supprimer
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('storage/' . $product->image_path) }}" 
                                 alt="{{ $product->name }}" 
                                 class="img-fluid rounded">
                        </div>
                        <div class="col-md-6">
                            <h3>{{ $product->name }}</h3>
                            <p class="text-success fw-bold fs-4">{{ number_format($product->price, 2) }} €</p>
                            
                            @if($product->category)
                                <p>
                                    <strong>Catégorie :</strong> 
                                    <span class="badge bg-secondary">{{ $product->category->name }}</span>
                                </p>
                            @endif
                            
                            <p><strong>Créé le :</strong> {{ $product->created_at->format('d/m/Y à H:i') }}</p>
                            <p><strong>Mis à jour le :</strong> {{ $product->updated_at->format('d/m/Y à H:i') }}</p>
                            
                            @if($product->details)
                                <div class="mt-3">
                                    <h6>Détails :</h6>
                                    <p class="text-muted">{{ $product->details }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i>Retour à la liste
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>