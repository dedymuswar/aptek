@extends('layouts.app-admin')
@section('content')
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        {{-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Library</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
          </nav> --}}
    </div>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4">Metode DEPKES - Ruangan Rawat</h3>
                    <form-rrawat></form-rrawat>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection