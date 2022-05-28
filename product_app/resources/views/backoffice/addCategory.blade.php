@extends('layouts.app')

@section('additional-js')
<script src="{{ url('js/category.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
            <h1>Tambah Kategori Produk</h1>
            <div class="container mt-4">
                <form action="/category" id="addProductForm">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6 px-1">
                            <label for="category"><b>Nama Kategori</b></label>
                            <input 
                                type="text" 
                                name="category" 
                                class="form-control" 
                                id="category_name" 
                                placeholder="Nama Kategori" required>
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn btn-primary" id="addCategory">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-12">
            <h1>Semua Category</h1>
            <div class="mt-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categoryCollection as $category)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $category->category_name }}</td>
                            <td>
                                <button 
                                    class="btn btn-warning"
                                    data-toggle="modal" 
                                    data-target="#updateModal{{ $loop->iteration }}">Edit
                                </button>
                                <button class="btn btn-danger" id="deleteCategory">Hapus</button>
                            </td>
                        </tr>

                        <div class="modal fade" id="updateModal{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel{{ $loop->iteration }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">

                                <form action="/category/{{ $category->uuid }}" id="updateProductForm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateModalLabel{{ $loop->iteration }}">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @csrf
                                            <div class="form-group col-md-12 px-0">
                                                <input 
                                                    type="text" 
                                                    name="category" 
                                                    class="form-control" 
                                                    id="category_name_{{ $loop->iteration }}" 
                                                    placeholder="Nama Kategori" value="{{ $category->category_name }}">
                                                <input type="hidden" name="_iteration" value="{{ $loop->iteration }}">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary" id="updateCategory">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection