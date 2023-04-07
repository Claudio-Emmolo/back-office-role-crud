<form action="{{ route($route, $product->id) }}" method="POST" class="border p-5">
    @csrf
    @method($method)

    <label for="title" class="form-label">Titolo</label>
    <input type="text" class="form-control" id="title" name="title" required
        value="{{ old('title', $product->title) }}">

    <label for="description" class="form-label">Descrizione</label>
    <input type="text" class="form-control" id="description" name="description" required
        value="{{ old('description', $product->description) }}">

    <label for="price" class="form-label">Prezzo</label>
    <input type="number" class="form-control" id="price" name="price" required min="1" step="any"
        value="{{ old('price', $product->price) }}">

    <button type="submit" class="btn btn-success mt-5">
        <i class="fa-solid fa-floppy-disk"></i>
    </button>
</form>
