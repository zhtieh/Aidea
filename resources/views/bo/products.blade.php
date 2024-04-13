@extends('bo.layouts')

@section('content')
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
	  <div class="modal-dialog modal-xl">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="ModalProductName">Product Name</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
            <table class="table table-bordered">
							<tbody>
							<form class="bannerForm">
                <input type="hidden" name="ProductGUID" id="ModalProductGUID" value="">
								<tr>
										<th scope="col">Name</th>
										<td>
											<input type="text" id="ModalProductName" name="Name" class="form-control">
										</td>
								</tr>
								<tr>
										<th scope="col">Description</th>
										<td>
											<textarea id="ModalProductDescription" name="Description" rows="2" cols="50"></textarea>
										</td>
								</tr>
                <tr>
                    <th scope="col">Cover Photo</th>
                    <td>
                      <img src="https://images.vanguardbuffle.com/Aidea/Product/add.png" style="width:200px; height: 200px;" class="mb-2" id="CoverPhotoImg">
                      <button type="button" class="btn btn-danger" style="visibility:hidden" id="CoverPhotoImgRemove" onclick="removeImageInput('CoverPhotoImgInput','CoverPhotoImg')">
                          <i class="fa fa-xmark"></i>
                      </button>
										  <input class="form-control" type="file" id="CoverPhotoImgInput" accept="image/png, image/jpeg" onchange="readProductURL(this,'CoverPhotoImg');" name="UploadCoverImage" data-id="CoverPhotoImg">
                    </td>
                </tr>
                <tr>
                    <th scope="col">Product Photo 1</th>
                    <td>
                    <div class = 'wrapper'>
                        <div class = "upload">
                            <div class = "upload-wrapper">
                                <div class = "upload-img">
                                    <!-- image here -->
                                </div>
                                <div class = "upload-info">
                                    <p>
                                        <span class = "upload-info-value">0</span> file(s) uploaded.
                                    </p>
                                </div>
                                <div class = "upload-area">
                                    <div class = "upload-area-img">
                                        <img src = "https://images.vanguardbuffle.com/Aidea/Product/upload.png" alt = "">
                                    </div>
                                    <p class = "upload-area-text">Select images or <span>browse</span>.</p>
                                </div>
                                <input type = "file" class = "visually-hidden" id = "upload-input" multiple>
                            </div>
                        </div>
                    </div>
                    </td>
                </tr>
							</form>
							</tbody>
						</table>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Send message</button>
	      </div>
	    </div>
	  </div>
	</div>
  <script type="text/javascript">
    $(document).ready(function(){
        $(".upload-area").click(function(){
            $('#upload-input').trigger('click');
        });

        $('#upload-input').change(event => {
            if(event.target.files){
                let filesAmount = event.target.files.length;
                $('.upload-img').html("");

                for(let i = 0; i < filesAmount; i++){
                    let reader = new FileReader();
                    reader.onload = function(event){
                        let html = `
                            <div class = "uploaded-img">
                                <img src = "${event.target.result}" style="width:300px;height:200px">
                                <button type = "button" class = "remove-btn">
                                    <i class = "fas fa-times"></i>
                                </button>
                            </div>
                        `;
                        $(".upload-img").append(html);
                    }
                    reader.readAsDataURL(event.target.files[i]);
                }

                $('.upload-info-value').text(filesAmount);
                $('.upload-img').css('padding', "20px");
            }
        });

        $(window).click(function(event){
            if($(event.target).hasClass('remove-btn')){
                $(event.target).parent().remove();
            } else if($(event.target).parent().hasClass('remove-btn')){
                $(event.target).parent().parent().remove();
            }
        })
      });
      function readProductURL(input,target) {
		    if (input.files && input.files[0]) {
		      var reader = new FileReader();
		      reader.onload = function (e) {
		        $('#'+target).attr('src', e.target.result);
		      };
		      reader.readAsDataURL(input.files[0]);

          $('#'+target+'Remove').css('visibility','visible');
		    }
	  	}

      function removeImageInput(input,target)
      {
        var fileInput = document.getElementById(input);
        if (fileInput.files && fileInput.files[0]) {
          $('#'+target).attr('src', 'https://images.vanguardbuffle.com/Aidea/Product/add.png');
		      
          $('#'+input).val('');

          $('#'+target+'Remove').css('visibility','hidden');
		    }
      }

      $.ajax({
          url:"{{ route('GetProductDetails', ['f8706ffa-f930-11ee-afb0-5a2ac55c7f6a']) }}",
          method: 'GET',
          processData: false,
          contentType: false,
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response){
            console.log(response);
          }
        });
  </script>
@endsection