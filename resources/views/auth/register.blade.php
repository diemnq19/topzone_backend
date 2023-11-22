<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="description">Description:</label>
    <textarea name="description" id="description" required></textarea>

    <label for="price">Price:</label>
    <input type="number" name="price" id="price" step="0.01" required>

    <label for="brand_id">Brand:</label>
    <select name="brand_id" id="brand_id" required>

        <option value="1">Brand 1</option>
        <option value="2">Brand 2</option>
    </select>

    <label for="image">Image:</label>
    <input type="file" name="image" id="image" accept="image/*">

    <label for="percent_discount">Percent Discount:</label>
    <input type="number" name="percent_discount" id="percent_discount" step="0.01">

    <label for="unit">Unit:</label>
    <input type="text" name="unit" id="unit" value="$">

    <button type="submit">Create Product</button>
</form>
