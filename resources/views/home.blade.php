@extends('layouts.app')

@section('content')
    @include('view')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="col-12 col-md-12">
                            <div class="card text-left">
                                <div class="card-header d-flex justify-content-between bg-light">
                                    <h4 class="card-title">Customer List</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Category id</th>
                                                <th>Category name</th>
                                                <th>Address</th>
                                                <th>City</th>
                                                <th>Mobile</th>
                                                <th>Emaill</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @forelse ($customers as $key => $customer)
                                                <tr class="customer-data">
                                                    <td scope="row">{{ $customer->name }}</td>
                                                    <td scope="row">{{ $customer->category->id }}</td>
                                                    <td scope="row">{{ $customer->category->name }}</td>
                                                    <td scope="row">{{ $customer->address }}</td>
                                                    <td scope="row">{{ $customer->city }}</td>
                                                    <td scope="row">{{ $customer->mobile }}</td>
                                                    <td scope="row">{{ $customer->email }}</td>

                                                    {{-- <td scope="row">{{ $customer->route->name }}</td> --}}
                                                    {{-- <td scope="row">{{ Str::limit($sale->comments, 10, '...') }}</td> --}}
                                                    <td>
                                                        <div class="btn-group">

                                                            <a class="btn btn-primary view-data" data-bs-toggle="modal">
                                                                View
                                                            </a>
                                                            <input type="hidden" value="{{ $customer->id }}"
                                                                class="customer-id">
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('script')
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>


        <script>
            $('document').ready(function() {

                $('.view-data').click(function() {


                    var id = $(this).closest('.customer-data').find('.customer-id').val();


                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "GET",
                        // url: "/salesTeam/sales/" + id,
                        url: "/customer/",
                        data: {
                            'id': id,
                        },
                        success: function(response) {
                            console.log(response);
                            $('#customer_name').text(response.name)
                            $('#customer_email').text(response.email)
                            $('#customer_mobile').text(response.mobile)
                            $('#customer_category_id').text(response.category_id)
                            $('#customer_city').text(response.city)
                            $('#customer_address').text(response.address)
                            $('#customer_view').modal('show')

                        }
                    });
                })

            });
        </script>
    @endpush
@endsection
