@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="page-heading">
    <h3>Dashboard</h3>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12 col-md-12">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Hello World!</strong> Ini adalah contoh alert Bootstrap di Laravel + Mazer.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </section>
</div>
@endsection
