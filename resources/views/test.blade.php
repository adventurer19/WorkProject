<div class="mb-3">
    @foreach($roles as $role)
        <div class="form-check">
            <input class="form-check-input"
                   name ="roles[]"
                   type="checkbox"
                   value="{{$role->id}}"
                   id="{{$role->name}}">
            <label class="form-check-input" for="{{$role->name}}">
                {{$role->name}}
            </label>
        </div>
</div>
