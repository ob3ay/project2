
@props(['name','value'=>"",'lable','hint','type'=>"text"])
    @isset($lable)
    <label for="{{ $name }}">{{ $lable }}</label>
    @endisset
<div class="mb-3">
    <input type="{{ $type }}" id="{{ $name }}" class="form-control 
    @error($name)is-invalid @enderror"  name="{{ $name }}"
    @isset($hint)
    placeholder="{{ $hint }}"
    @endisset
    value="{{ old($name,$value) }}"
    >
    @error($name)
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>
