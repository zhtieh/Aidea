@extends('bo.layouts')

@section('content')
<style>
  .datatable-container
  {
    overflow-x: scroll;
  }
</style>
	<div class="pagetitle">
      <h1>Orders</h1>
      <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Orders</li>
            <li class="breadcrumb-item active">All Orders</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row flex-row-reverse">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body" style="padding: 20px;">
              <!-- Table with stripped rows -->
              <table class="table datatable" id="ActiveMaidTable">
                <thead>
                  <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Phone
                    </th>
                    <th>
                        Product Name
                    </th>
                    <th>
                        Price(RM)
                    </th>
                    <th>
                        Transaction ID
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        DateTime
                    </th>
                  </tr>
                </thead>
                <tbody>
                	@foreach($orders as $order)
                		<tr>
                            <td>
                                {{ $order->name }}
                            </td>
                            <td>
                                {{ $order->email }}
                            </td>
                            <td>
                                {{ $order->phone }}
                            </td>
                            <td>
                                {{ $order->detail }}
                            </td>
                            <td>
                                {{ $order->amount }}
                            </td>
                            <td>
                              {{ $order->transaction_id }}
                            </td>
                            <td>
                                {{ $order->Status }}
                            </td>
                            <td>
                                {{ $order->DateTime }}
                            </td>
                        </tr>
                	@endforeach
                </tbody>
                </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
      @endsection