<form wire:submit.prevent="submit" class="mb-4 bg-secondary-subtle rounded p-3">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6 mb-2">
            <label for="name" class="form-label">Name</label>
            <input wire:model="name"
                   type="text"
                   class="form-control @error('name') is-invalid @enderror"
                   id="name"
                   placeholder="Enter name"
            >
            @error('name')<div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-6 mb-2">
            <label for="rating" class="form-label">Your rating</label>
            <select wire:model="rating" id="rating" class="form-control @error('rating') is-invalid @enderror">
                <option>Select your rating</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            @error('rating')<div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-12 mb-2">
            <label for="body" class="form-label">Comment</label>
            <textarea wire:model="body"
                      class="form-control @error('body') is-invalid @enderror"
                      id="body"
                      placeholder="Enter your comment"></textarea>
            @error('body')<div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-12">
            <button class="btn btn-primary"
                    type="submit"
                    wire:loading.delay.attr="disabled"
            >
                Add comment <span wire:loading.delay>...</span>
            </button>
        </div>
    </div>
</form>
