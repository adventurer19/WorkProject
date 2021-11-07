@csrf


<div class="mb-3">
    <label for="category" class="form-label"></label>
    <input type="text" name="category"
           class="form-control @error('category') is-invalid @enderror"
           id="category" aria-describedby="category"
           placeholder="Write a category name"
           value="">


    @error('category')
    <span class="invalid-feedback" role="alert">{{$message}}</span>
    @enderror


</div>
<button type="submit" class="btn btn-primary">Save</button>

