@extends('layouts.app-admin')
@section('content')
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Selamat datang <strong>{{ Auth::user()->name }}</strong> di Aptek 10 - Nay</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <h4 class="mb-4">Pendahuluan</h4>
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Well done!</h4>
                        <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                        <hr>
                        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                      </div>
                    <p class="text-muted">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam quos incidunt quam ex unde odit veniam minus corporis voluptas reiciendis labore reprehenderit, hic ullam numquam excepturi a cumque aspernatur eaque quasi, eius pariatur natus eum officiis ipsa. Ullam, iste tempore! Repellendus unde consequuntur praesentium architecto excepturi fugiat labore sapiente temporibus?</p>
                </div>
            </div>
        </div>
    </div> <!-- row -->

</div>
@endsection