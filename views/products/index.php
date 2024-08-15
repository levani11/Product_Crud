<h1>Products CRUD</h1>

<p>
    <a href="/products/create" type="button" class="btn btn-sm btn-success">Add Product</a>
</p>
<form action="" method="get">
    <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="Search" value="">
        <div class="input-group-append">
            <button class="btn btn-success" type="submit">Search</button>
        </div>
    </div>
</form>
<table class="table" style="text-align: center">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Price</th>
        <th scope="col">Description</th>
        <th scope="col">Create Date</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody id="tbody">

    </tbody>
</table>


<script>
    const products = <?php echo json_encode($products); ?>;
    console.log(products)
    fillTable = (products) => {
        document.getElementById('tbody').innerHTML = products.map(product => `
            <tr>
                <th scope="row">${product.id}</th>
                <td>
                    ${product.image ? `<img src="/${product.image}" alt="" style="width: 80px">` : ''}
                </td>
                <td>${product.title}</td>
                <td>${product.price}</td>
                <td>${product.description ?? ''}</td>
                <td>${product.create_date}</td>
                <td>
                    <a href="/products/update?id=${product.id}" class="btn btn-sm btn-outline-primary">Edit</a>
                    <form method="post" action="/products/delete" class="d-inline-block">
                        <input type="hidden" name="id" value="${product.id}">
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        `).join('');
    }

    fillTable(products);



</script>
