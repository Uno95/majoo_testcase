@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Produk</h1>
            <div class="container">
                <div class="row mt-3">
                    <div class="col px-1 text-center">
                        <div class="product-item pt-1 pb-0">
                            <img src="{{ url('images/standard_repo.png') }}" alt="majoo-pro">
                            <div class="content">
                                <p id="title">Majoo Pro</p>
                                <p id="price">Rp. 10.000.000</p>
                                <p class="px-2" id="description">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </p>
                                <button class="btn btn-primary col-md-12">Beli</button>
                            </div>
                        </div>
                    </div>
                    <div class="col px-1 text-center">
                        <div class="product-item pt-1 pb-0">
                            <img src="{{ url('images/paket-advance.png') }}" alt="majoo-pro">
                            <div class="content">
                                <p id="title">Majoo Pro</p>
                                <p id="price">Rp. 10.000.000</p>
                                <p class="px-2" id="description">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </p>
                                <button class="btn btn-primary col-md-12">Beli</button>
                            </div>
                        </div>
                    </div>
                    <div class="col px-1 text-center">
                        <div class="product-item pt-1 pb-0">
                            <img src="{{ url('images/paket-lifestyle.png') }}" alt="majoo-pro">
                            <div class="content">
                                <p id="title">Majoo Pro</p>
                                <p id="price">Rp. 10.000.000</p>
                                <p class="px-2" id="description">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </p>
                                <button class="btn btn-primary col-md-12">Beli</button>
                            </div>
                        </div>
                    </div>
                    <div class="col px-1 text-center">
                        <div class="product-item pt-1 pb-0">
                            <img src="{{ url('images/paket-desktop.png') }}" alt="majoo-pro">
                            <div class="content">
                                <p id="title">Majoo Pro</p>
                                <p id="price">Rp. 10.000.000</p>
                                <p class="px-2" id="description">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </p>
                                <button class="btn btn-primary col-md-12">Beli</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
