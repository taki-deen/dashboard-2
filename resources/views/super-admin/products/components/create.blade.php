<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="create-form" class="form">
                
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label  class="form-label" for="description">Description</label>
                            <input type="text"  class="form-control" id="description">
                        </div>
                        <div class="form-group">
                            <label  class="form-label" for="stock">Stock</label>
                            <input type="number"  class="form-control" id="stock">
                        </div>
                        <div class="form-group">
                            <label  class="form-label" for="price">Price</label>
                            <input  class="form-control" type="number" id="price">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>