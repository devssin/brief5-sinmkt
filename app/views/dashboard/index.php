<?php require APPROOT . "/views/inc/header.php"; ?>
<div class="container-md ">
    <?php echo flash('logged_user'); ?>
    
    <div class="row mt-5">
        <div class="col">
            <h1>Welcome <?php echo ucfirst($_SESSION['username']) ?></h1>
        </div>
        <div class="col d-flex justify-content-end">
            <a href="<?php echo URLROOT?>/products/add" class="btn btn-primary d-flex align-items-center"><i class="fas fa-plus me-1"></i> Add Product</a>
        </div>
    </div>

    <table class="table table-sm table-hover mt-5 mx-auto">
        <thead>
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">Categorie</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['products'] as $product) : ?>
                <tr>
                    <td class="align-middle"><?= $product->name ?></td>
                    <td class="align-middle"><img src="<?= $product->image ?>" alt="" style="width: 100px"></td>
                    <td class="align-middle"><?= $product->description ?></td>
                    <td class="align-middle"><?= $product->name_cat ?></td>
                    <td class="align-middle">
                        <a href="<?php echo URLROOT ?>/products/edit/<?php echo $product->id_prod ?>" class="btn btn-outline-primary btn-sm"><i class="fas fa-pencil"></i>Edit</a>
                        <a href="<?php echo URLROOT ?>/products/delete/<?php echo $product->id_prod ?>" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i>Delete</a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require APPROOT . "/views/inc/footer.php"; ?>