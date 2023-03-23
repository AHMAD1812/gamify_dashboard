@error('alert-danger')
    <div class="w-100 p-1 bg-danger text-white">
        <span class="tag bg fs-5">{{$message }}</span>
    </div>
@enderror
@error('alert-info')
    <div class="w-100 p-1 bg-info text-white">
        <span class="tag bg fs-5">{{$message }}</span>
    </div>
@enderror
@error('alert-warning')
    <div class="w-100 p-1 bg-warning text-white">
        <span class="tag bg fs-5">{{$message }}</span>
    </div>
@enderror
@error('alert-success')
    <div class="w-100 p-1 bg-success text-white">
        <span class="tag label fs-5">{{$message }}</span>
    </div>
@enderror