<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row ">
    <div class="col-md-6 mx-auto ">
        <div class="card card-body my-5 bg-light vh-60">
            <h2 class="text-center mb-5">Add Product</h2>
            <form action="<?php echo URLROOT . '/products/add' ?>" method="post" enctype="multipart/form-data">

                <div class="form-group mt-3">
                    <input type="text" name="name" placeholder="Enter Product name" class="form-control <?php echo (!empty($data['name_err']) ? 'is-invalid' : ''); ?>" value="<?php echo $data['name'] ?>">
                    <span class="invalid-feedback"><?php echo $data['name_err'] ?></span>
                </div>
                <div class="form-group mt-3">
                    <input type="file" name="image" placeholder="Product Image" class="form-control <?php echo (!empty($data['image_err']) ? 'is-invalid' : ''); ?>" value="<?php echo $data['image'] ?>">
                    <span class="invalid-feedback"><?php echo $data['image_err'] ?></span>
                </div>
                <div class="form-group mt-3">
                    <input type="number" name="price" placeholder="Enter Product price" class="form-control <?php echo (!empty($data['price_err']) ? 'is-invalid' : ''); ?>" value="<?php echo $data['price'] ?>">
                    <span class="invalid-feedback"><?php echo $data['price_err'] ?></span>
                </div>
                <div class="form-group mt-3">
                    <textarea name="description" class="form-control form-control <?php echo (!empty($data['description_err'])) ? 'is-invalid' : ''; ?>" placeholder="Add some description..."><?php echo $data['description']; ?></textarea>
                    <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
                </div>
                <div class="form-group mt-3">
                    <select name="id_cat" id="cat" class="form-control <?php echo (!empty($data['id_cat_err'])) ? 'is-invalid' : ''; ?>">
                        <option value="0">Select a category</option>
                        <?php foreach($data['categories'] as $category) :?>
                        <option value="<?= $category->id_cat ?>"><?= $category->name_cat; ?></option>

                        <?php endforeach;?>
                    </select>
                    <span class="invalid-feedback"><?php echo $data['id_cat_err']; ?></span>
                </div>
                <button type="submit" class="btn btn-warning mt-3">Add Product</button>
        </div>
        </form>
    </div>
</div>
</div>
<?php require APPROOT . '/views/inc/footer.php' ?>