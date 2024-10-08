


<form method="post" enctype="multipart/form-data">
    <?php if ($product['image']): ?>
        <img src="/<?php echo $product['image'] ?>" class="product-img-view" style="width: 80px">
    <?php endif; ?>
    <div class="form-group">
        <label>Product Image</label><br>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label>Product title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $product['title'] ?>">
    </div>
    <div class="form-group">
        <label>Product description</label>
        <textarea class="form-control" name="description"><?php echo $product['description'] ?></textarea>
    </div>
    <div class="form-group">
        <label>Product price</label>
        <input type="number" step=".01" name="price" class="form-control" value="<?php echo $product['price'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>