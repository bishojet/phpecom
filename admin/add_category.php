<?php 

include 'inc/header.php'; 
include_once '../middleware/adminMiddleware.php'; 

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Category</h3>
                </div>
                <form action="code.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="slug" placeholder="Slug">
                        </div>
                        <div class="mb-3">
                            <textarea row="3" class="form-control" name="description" placeholder="Description"></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="meta_title" placeholder="Meta Title">
                        </div>
                        <div class="mb-3">
                            <textarea row="3" class="form-control" name="meta_description" placeholder="Meta Description"></textarea>
                        </div>
                        <div class="mb-3">
                            <textarea row="3" class="form-control" name="meta_keywords" placeholder="Meta Keywords"></textarea>
                        </div>
                        <div class="col-md-6" >
                            <label for="">Status</label>
                            <input type="checkbox" name="status">
                        </div>
                        <div class="col-md-6">
                            <label for="">Popular</label>
                            <input type="checkbox" name="popular">
                        </div>
                        <input type="button" value="Add Category" name="add_category" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>


<?php include 'inc/footer.php'; ?>


		status	popular				