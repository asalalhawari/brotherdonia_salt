@if($product->upload_image==1)
    <div class="form-group mb-3">
        <label for="lcbgRequest">@langucw('Send to us your custom image')</label>
        <div class="needsclick dropzone dz-clickable" id="product-dropzone">
            <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
        </div>
        <span class="help-block"></span>
    </div>
@endif
