@extends('layouts.app')

@section('additional-css')
<link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
@endsection

@section('additional-js')
<script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>
<script>
  var toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
    ['blockquote', 'code-block'],

    [{ 'header': 1 }, { 'header': 2 }],               // custom button values
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
    [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
    [{ 'direction': 'rtl' }],                         // text direction

    [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
    [{ 'font': [] }],
    [{ 'align': [] }],

    ['clean']                                         // remove formatting button
  ];

  var editor = new Quill('#editor', {
    modules: {
    toolbar: toolbarOptions
  },
  placeholder: 'Compose an epic...',
  theme: 'snow'  // or 'bubble'
  });
  
  $("#addProductForm").on("submit",function() {
    console.log($("#editor").html());
    $("#description").val($(".ql-editor").html());
  });

  function _(el) {
    return document.getElementById(el);
  }
  function uploadFile() {
      console.log(_("image"));
    var file = _("image").files[0];
    var formdata = new FormData();
    formdata.append("image", file);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
  }
  
  function progressHandler(event) {
    _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
    
    var percent = (event.loaded / event.total) * 100;
    _("progressBar").value = Math.round(percent);
    _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
  }
</script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Tambah Produk</h1>
            <div class="container mt-4">
                <form action="/store-product" method="POST" id="addProductForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6 px-1">
                            <label for="productName"><b>Nama Produk</b></label>
                            <input type="text" name="productName" class="form-control" id="productName" placeholder="Nama Produk">
                        </div>
                        <div class="form-group col-md-6 px-1">
                            <label for="price"><b>Harga Produk</b></label>
                            <input type="text" name="price" class="form-control" id="price" placeholder="Harga Produk">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 px-1">
                            <label for="category"><b>Kategori Produk</b></label>
                            <select class="form-control" name="category" id="category>">
                                <option selected>Open this select menu</option>
                                @foreach($categoryCollection as $category)
                                <option value="{{ $category->uuid }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6 px-1">
                            <label for="image"><b>Upload Gambar Produk</b></label>
                            <input type="file" name="image" class="form-control-file" id="image" placeholder="Pilih gambar" onchange="uploadFile()">
                            <progress id="progressBar" value="0" max="100" style="width:100%;"></progress>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 px-1">
                            <p class="row col-md-12"><b>Deskripsi</b></p>
                            <textarea name="description" id="description" style="display: none;" ></textarea>
                            <div class="col-md-12" id="editor">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection