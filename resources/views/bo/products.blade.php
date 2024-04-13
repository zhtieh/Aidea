@extends('bo.layouts')
	<div class="pagetitle">
      <h1>Active Maids</h1>
      <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Our Maids</li>
            <li class="breadcrumb-item active">Active Maids</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
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
                        Cover Photo
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Price(RM)
                    </th>
                    <th>
                        Sold
                    </th>
                    <th>
                        Actions
                    </th>
                  </tr>
                </thead>
                <tbody>
                	@foreach($products as $product)
                		<tr>
                            <td>
                                {{ $product->Name }}
                            </td>
                            <td>
                                <img src="{{ $product->CoverPhotoURL }}?v={{ time() }}" style="width:200px; height: 200px;">
                            </td>
                            <td>
                                {{ $product->Description }}
                            </td>
                            <td>
                                {{ $product->Price }}
                            </td>
                            <td>
                                {{ $product->Sold }}
                            </td>
                            <td align="center">
                                <a href="#" class="btn btn-light actionEdit" data-guid="" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="#" class="btn btn-light actionDelete" data-guid="" data-code="" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-trash"></i></a>
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

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        <form>
	          <div class="mb-3">
	            <label for="recipient-name" class="col-form-label">Recipient:</label>
	            <input type="text" class="form-control" id="recipient-name">
	          </div>
	          <div class="mb-3">
	            <label for="message-text" class="col-form-label">Message:</label>
	            <textarea class="form-control" id="message-text"></textarea>
	          </div>
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Send message</button>
	      </div>
	    </div>
	  </div>
	</div>
@section('content')
@endsection