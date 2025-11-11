
@props(['name','value'=>"",'lable','hint'])
    @isset($lable)
    <label for="{{ $name }}">{{ $lable }}</label>
    @endisset
<div class="mb-3">
    <textarea  id="{{ $name }}" class="form-control
    @error($name)is-invalid @enderror"  name="{{ $name }}"
    @isset($hint)
    placeholder="{{ $hint }}"
    @endisset
    value="{{ old($name,$value) }}"
    rows="5"
    ></textarea>
    @error($name)
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>
