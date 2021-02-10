<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content about">
        <div class="modal-header">
          <h2 class="modal-title text-green" id="exampleModalLabel">ABOUT US</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body popup-max-hgt">
            <form action="{{ route('admin.store') }}" method="POST">
                @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Name:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Name">
                @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description" placeholder="Enter Description"></textarea>
                @error('description') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
              <div class="mb-3">
                <label for="regular_price" class="form-label">Regular Price:</label>
                <input type="text" class="form-control" id="regular_price" name="regular_price" placeholder="Enter Regular Price">
                @error('regular_price') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
              <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="text" class="form-control" id="image" name="image" placeholder="Enter Image">
                @error('image') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
              <div class="mb-3">
                <label for="subcategory_id" class="form-label">Category:</label>
                <input type="text" class="form-control" id="subcategory_id" name="subcategory_id" placeholder="Enter Category">
                @error('subcategory_id') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
        </div>
        <div class="modal-footer">
            <button wire:click="closeModal()" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
