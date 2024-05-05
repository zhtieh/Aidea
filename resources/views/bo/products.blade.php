@extends('bo.layouts')

@section('content')
	<div class="pagetitle">
      <h1>Active Products</h1>
      <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Products</li>
            <li class="breadcrumb-item active">Active Products</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row flex-row-reverse">
      	<button type="button" class="btn btn-success" style="width:150px;margin-bottom: 15px;margin-right: 12px;" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="ClearForm()">Add Product</button>
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
                        Promo Price(RM)
                    </th>
                    <th>
                        Hot Sales
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
                                {{ $product->PromotionPrice }}
                            </td>
                            <td>
                              <div class="form-check form-switch">
                                  @if($product->HotSales == 0)
                                      <label class="switch">
                                        <input type="checkbox" class=".HotSalesCB" onclick="SetHotSales(this,'{{ $product->ProductGUID }}')">
                                        <span class="slider round"></span>
                                      </label>
                                  @else
                                      <label class="switch">
                                        <input type="checkbox" checked class=".HotSalesCB" onclick="SetHotSales(this, '{{ $product->ProductGUID }}')">
                                        <span class="slider round"></span>
                                      </label>
                                  @endif
                                </div>
                            </td>
                            <td align="center">
                                <a href="#" class="btn btn-light actionEdit" data-guid="" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="GetProductDetails('{{ $product->ProductGUID }}')"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="#" class="btn btn-light actionDelete" data-guid="{{ $product->ProductGUID }}" data-code="" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-trash"></i></a>
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
	  <div class="modal-dialog modal-xl modal-dialog-scrollable">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="ModalProductNameTitle">Add New Product</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
            <table class="table table-borderless">
				<tbody>
					<form id="productForm">
						<input type="hidden" name="Action" id="ModalAction" value="Add">
                		<input type="hidden" name="ProductGUID" id="ModalProductGUID" value="">
					<tr>
						<th scope="col">Name:</th>
						<td>
							<input type="text" id="ModalProductName" name="Name" class="form-control">
						</td>
					</tr>
					<tr>
						<th scope="col">Description:</th>
						<td>
							<textarea id="ModalProductDescription" name="Description" rows="2" class="w-100"></textarea>
						</td>
					</tr>
					<tr>
						<th scope="col">Price(RM):</th>
						<td>
							<input type="number" class="form-control" name="Price" id="ModalProductPrice" value="" data-type="currency" placeholder="0.00">
						</td>
					</tr>
          <tr>
            <th scope="col">Promotion Price(RM):</th>
            <td>
              <input type="number" class="form-control" name="PromoPrice" id="ModalPromoPrice" value="" data-type="currency" placeholder="0.00">
            </td>
          </tr>
					<tr>
						<th scope="col">Quantity:</th>
						<td>
							<input type="number" class="form-control" name="Quantity" id="ModalProductQuantity" value="" placeholder="0">
						</td>
					</tr>
	                <tr>
	                    <th scope="col">Cover Photo:</th>
	                    <td>
	                    	<input type="hidden" name="CoverAction" id="CoverAction" value="No">
	                      <img src="https://images.vanguardbuffle.com/Aidea/Product/add.png" style="width:200px; height: 200px;" class="mb-2" id="CoverPhotoImg">
	                      <button type="button" class="btn btn-danger" style="visibility:hidden" id="CoverPhotoImgRemove" onclick="removeImageInput('CoverPhotoImgInput','CoverPhotoImg')">
	                          <i class="fa fa-xmark"></i>
	                      </button>
						  <input class="form-control" type="file" id="CoverPhotoImgInput" accept="image/png, image/jpeg" onchange="readProductURL(this,'CoverPhotoImg');" name="UploadCoverImage" data-id="CoverPhotoImg">
	                    </td>
	                </tr>
	                <tr>
	                	<th scope="col">Product Photos:</th>
	                	<td>
	                		<input type="hidden" name="PhotoAction" id="PhotoAction" value="No">
	                		<input class="form-control" type="file" id="image-upload" accept="image/*" name="UploadProductPhotoImage[]" multiple>
        					     <div id="preview-container"></div>
	                	</td>
	                </tr>
	                <tr>
	                    <th scope="col">File:</th>
	                    <td>
	                    	<input type="hidden" name="FileAction" id="FileAction" value="No" >
	                    	<input type="file" class="form-control" id="ProductFile" name="ProductFile[]" multiple>
                        <div id="preview-fileLink" class="preiview-fileContainer">
                        </div>
	                    </td>
	                </tr>
	                <tr>
	                	<td>
	                	</td>
	                	<td style="">
	                		<button type="submit" class="btn btn-primary" style="float: right;" id="ProductSubmitBtn">Submit</button>
	                	</td>
	                </tr>
				</form>
				</tbody>
			</table>
	      </div>
	    </div>
	  </div>
	</div>
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content deleteConfirmationModal">
          <div class="modal-header" style="border-bottom: 2px solid #0C4160">
            <div class="modalHeader fs-5" id="staticBackdropLabel">Delete Confirmation</div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body modalDesc" style="border-bottom: 2px solid #0C4160">
            Confirm Delete Product?
          </div>
          <div class="modal-footer" style="border-bottom: 2px solid #0C4160">
            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Confirm</button>
          </div>
        </div>
      </div>
    </div>
  <script type="text/javascript">
  	const input = document.getElementById('image-upload');
    const previewContainer = document.getElementById('preview-container');
     const fileInput = document.getElementById('ProductFile');
    const previewFileContainer = document.getElementById('preview-fileLink');

    $(document).ready(function(){
        input.addEventListener('change', function () {
        	$('#PhotoAction').val('Yes');
            const files = this.files;
            previewContainer.innerHTML = '';
            if (files) {
            	var a = Array.from(files).reverse();
            	console.log(Array.from(files));
            	console.log(a);
                a.forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('preview-image');
                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                });
            }
        });

        fileInput.addEventListener('change', (event) => {
          previewFileContainer.innerHTML = ''; // Clear previous preview

          for (const file of fileInput.files) {
            const fileNameElement = document.createElement('div');
            fileNameElement.classList.add('file-name');
            fileNameElement.textContent = file.name;
            previewFileContainer.appendChild(fileNameElement);
          }
      });

        $(".actionDelete").click(function(){
      	console.log($(this).attr('data-guid'));
      	     $("#confirmDeleteBtn").attr('data-guid',$(this).attr('data-guid'));
	    });


      });

      function readProductURL(input,target) {
      	$('#CoverAction').val('Yes');
      	console.log("in");
	    if (input.files && input.files[0]) {
	      var reader = new FileReader();
	      reader.onload = function (e) {
	        $('#'+target).attr('src', e.target.result);
	      };
	      reader.readAsDataURL(input.files[0]);

      		$('#'+target+'Remove').css('visibility','visible');
	    }
	    else{
	    	$('#'+target).attr('src', 'https://images.vanguardbuffle.com/Aidea/Product/add.png');
  			$('#'+target+'Remove').css('visibility','hidden');
	    }
	  }

      function removeImageInput(input,target)
      {
      	$('#CoverAction').val('Yes');
      	$('#'+target).attr('src', 'https://images.vanguardbuffle.com/Aidea/Product/add.png');
      	$('#'+target+'Remove').css('visibility','hidden');
        var fileInput = document.getElementById(input);
        if (fileInput.files && fileInput.files[0]) {
          $('#'+input).val('');
      	}
      }

      function GetProductDetails(productGUID)
      {
      	$('#ModalAction').val('Edit');
      	$.ajax({
          url: window.location.origin + "/GetProductDetails/" + productGUID,
          method: 'GET',
          processData: false,
          contentType: false,
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response){
          	var data = JSON.parse(response);
            console.log(data);
            LoadProductDetails(data.product);
          }
        });
      }

      function LoadProductDetails(details)
      {
      	console.log(details);
      	$('#ModalProductNameTitle').html(details.Name);
      	$('#ModalProductGUID').val(details.ProductGUID);
      	$('#ModalProductName').val(details.Name);
      	$('#ModalProductDescription').val(details.Description);
        $('#ModalPromoPrice').val(details.PromotionPrice);
      	$('#ModalProductPrice').val(details.Price);
      	$('#ModalProductQuantity').val(details.Quantity);
      	if(details.CoverPhotoURL != '')
      	{
      		$('#CoverPhotoImg').attr('src',details.CoverPhotoURL);
      	}
      	
      	previewContainer.innerHTML = '';

      	if(details.Photo1URL != '')
      	{
      		var img = document.createElement('img');
            img.src = details.Photo1URL;
            img.classList.add('preview-image');
            previewContainer.appendChild(img);
      	}

      	if(details.Photo2URL != '')
      	{
      		var img = document.createElement('img');
            img.src = details.Photo2URL;
            img.classList.add('preview-image');
            previewContainer.appendChild(img);
      	}

      	if(details.Photo3URL != '')
      	{
      		var img = document.createElement('img');
            img.src = details.Photo3URL;
            img.classList.add('preview-image');
            previewContainer.appendChild(img);
      	}

      	if(details.Photo4URL != '')
      	{
      		var img = document.createElement('img');
            img.src = details.Photo4URL;
            img.classList.add('preview-image');
            previewContainer.appendChild(img);
      	}

        if(details.Photo5URL != '')
        {
          var img = document.createElement('img');
            img.src = details.Photo5URL;
            img.classList.add('preview-image');
            previewContainer.appendChild(img);
        }

        previewFileContainer.innerHTML = '';

      	if(details.FileURL != '')
      	{
          var a = document.createElement('a');
          a.href = details.FileURL;
          a.innerHTML = (details.FileURL.split("/")).slice(-1);
          a.target = "_blank";
          previewFileContainer.appendChild(a);
      	}

        if(details.File1URL != '')
        {
          var a = document.createElement('a');
          a.href = details.File1URL;
          a.innerHTML = (details.File1URL.split("/")).slice(-1);
          a.target = "_blank";
          previewFileContainer.appendChild(a);
        }

        if(details.File2URL != '')
        {
          var a = document.createElement('a');
          a.href = details.Fil2eURL;
          a.innerHTML = (details.File2URL.split("/")).slice(-1);
          a.target = "_blank";
          previewFileContainer.appendChild(a);
        }

        if(details.File3URL != '')
        {
          var a = document.createElement('a');
          a.href = details.FileURL;
          a.innerHTML = (details.File3URL.split("/")).slice(-1);
          a.target = "_blank";
          previewFileContainer.appendChild(a);
        }

        if(details.File4URL != '')
        {
          var a = document.createElement('a');
          a.href = details.File4URL;
          a.innerHTML = (details.File4URL.split("/")).slice(-1);
          a.target = "_blank";
          previewFileContainer.appendChild(a);
        }
      }

      function ClearForm()
      {
      	$('#ModalAction').val('Add');
      	$('#ModalProductNameTitle').html("Add New Product");
      	$('#ModalProductGUID').html(uuidv4());
      	$('#ModalProductName').val('');
      	$('#ModalProductDescription').val('');
      	$('#ModalProductPrice').val('');
      	$('#ModalProductQuantity').val('');
      	$('#CoverPhotoImg').attr('src','https://images.vanguardbuffle.com/Aidea/Product/add.png');
      	previewContainer.innerHTML = '';
      	$('#ProductFileLink').css('display','none');
      	$('#image-upload').val('');
      	$('#ProductFile').val('');
      	$('#CoverPhotoImgInput').val('');
      }

      $("#productForm").submit(function(e){
        e.preventDefault();

        var u = "{{ route('EditProduct') }}";
        var successMsg = "Product has been edited successfully";

        if($('#ModalAction').val() == "Add")
        {
        	$('#ModalProductGUID').val(uuidv4());
        	u = "{{ route('AddNewProduct') }}";
        	successMsg = "Product has been added successfully";
        }
        $("#ProductSubmitBtn").html("Loading...");
        $("#ProductSubmitBtn").removeClass("btn-primary");
        $("#ProductSubmitBtn").addClass("btn-secondary");
        $("#ProductSubmitBtn").prop('disabled', true);

        var formData = new FormData(this);
        $.ajax({
          url:u,
          method: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response){
            console.log(response);
            alert(successMsg);
            window.location.href = "{{ route('products') }}";
          }
        })
      })

      $("#confirmDeleteBtn").click(function(e){
        var formData = new FormData();
        formData.append('ProductGUID',$(this).attr('data-guid'));
        
        $.ajax({
          url:"{{ route('DeleteProduct') }}",
          method: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response){
            console.log(response);
            alert("Product has been deleted successfully.");
            window.location.href = "{{ route('products') }}";
          }
        })
      })

      $("#ProductFile").change(function(){
      	$('#FileAction').val('Yes');
      	$('#ProductFileLink').css('display','none');
      });



       function uuidv4() { 
	    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'
	    .replace(/[xy]/g, function (c) { 
	        const r = Math.random() * 16 | 0,  
	            v = c == 'x' ? r : (r & 0x3 | 0x8); 
	        return v.toString(16); 
	    }); 
	  }

    function SetHotSales(e,pGUID) {
      var hSales = (e.checked == true) ? 1 : 0;
      console.log(hSales);
      var formData = new FormData();
      formData.append('ProductGUID',pGUID);
      formData.append('HotSales',hSales);

      $.ajax({
          url:"{{ route('SetHotSales') }}",
          method: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response){
            alert("Hot Sales has been set successfully.");
            window.location.href = "{{ route('products') }}";
          }
        })
    }

    $('#ModalProductPrice').change(function(){
        $('#ModalPromoPrice').val($('#ModalProductPrice').val());
    })
  </script>
@endsection