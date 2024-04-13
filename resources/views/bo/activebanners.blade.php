@extends('bo.layouts')

@section('content')
<div class="pagetitle">
      <h1>Banners</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Banners</li>
          <li class="breadcrumb-item active">Active Banners</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Active Banners</h5>

              <!-- Default Accordion -->
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                     Banner 1
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <table class="table table-bordered">
											  <tbody>
											  	<form class="bannerForm">
											  		<input type="hidden" name="BannerName" value="Banner1">
											  		<input type="hidden" name="BannerGUID" value="{{ $banners[0]->BannerGUID }}">
												    <tr>
											    			<th scope="col">Title</th>
											    			<td>
											    				<textarea id="bTitle1" name="BannerTitle" rows="2" cols="50">{{ $banners[0]->Title }}</textarea>
											    			</td>
												    </tr>
												    <tr>
												    		<th scope="col">Description</th>
												    		<td>
											    				<textarea id="bDesc1" name="BannerDesc" rows="2" cols="50">{{ $banners[0]->Description }}</textarea>
											    			</td>
												    </tr>
												    <tr>
												    		<th scope="col">Banner</th>
												    		<td><img src="{{ $banners[0]->BannerURL }}?v={{ time() }}" style="width:300px; height: 200px;" class="mb-2" id="Banner1Img">
												      		<input class="form-control" type="file" id="UploadBanner1Image" accept="image/png, image/jpeg" onchange="readBannerURL(this,'Banner1Img');" name="UploadBannerImage" data-id="Banner1Img"></td>
												    </tr>
												    <tr>
												    		<th scope="col">Mobile Banner</th>
												    		<td><img src="{{ $banners[0]->MobileBannerURL }}?v={{ time() }}" style="width:200px; height: 250px;" class="mb-2" id="MobileBanner1Img">
												      		<input class="form-control" type="file" id="UploadMobileBanner1Image" accept="image/png, image/jpeg" onchange="readBannerURL(this,'MobileBanner1Img');" name="UploadMobileBannerImage" data-id="MobileBanner1Img"></td>
												    </tr>
												    <tr>
												    	<td></td>
												    	<td><input type="submit" class="btn btn-success w-100" value="Update"></td>
												    </tr>
											    </form>
											  </tbody>
											</table>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                     Banner 2
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <table class="table table-bordered">
											  <tbody>
											  	<form class="bannerForm">
											  		<input type="hidden" name="BannerName" value="Banner2">
											  		<input type="hidden" name="BannerGUID" value="{{ $banners[1]->BannerGUID }}">
												    <tr>
											    			<th scope="col">Title</th>
											    			<td>
											    				<textarea id="bTitle2" name="BannerTitle" rows="2" cols="50">{{ $banners[1]->Title }}</textarea>
											    			</td>
												    </tr>
												    <tr>
												    		<th scope="col">Description</th>
												    		<td>
											    				<textarea id="bDesc2" name="BannerDesc" rows="2" cols="50">{{ $banners[1]->Description }}</textarea>
											    			</td>
												    </tr>
												    <tr>
												    		<th scope="col">Banner</th>
												    		<td><img src="{{ $banners[1]->BannerURL }}?v={{ time() }}" style="width:300px; height: 200px;" class="mb-2" id="Banner2Img">
												      		<input class="form-control" type="file" id="UploadBanner2Image" accept="image/png, image/jpeg" onchange="readBannerURL(this,'Banner2Img');" name="UploadBannerImage" data-id="Banner2Img"></td>
												    </tr>
												    <tr>
												    		<th scope="col">Mobile Banner</th>
												    		<td><img src="{{ $banners[1]->MobileBannerURL }}?v={{ time() }}" style="width:200px; height: 250px;" class="mb-2" id="MobileBanner2Img">
												      		<input class="form-control" type="file" id="UploadMobileBanner2Image" accept="image/png, image/jpeg" onchange="readBannerURL(this,'MobileBanner2Img');" name="UploadMobileBannerImage" data-id="MobileBanner2Img"></td>
												    </tr>
												    <tr>
												    	<td></td>
												    	<td><input type="submit" class="btn btn-success w-100" value="Update"></td>
												    </tr>
											    </form>
											  </tbody>
											</table>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                     Banner 3
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <table class="table table-bordered">
											  <tbody>
											  	<form class="bannerForm">
											  		<input type="hidden" name="BannerName" value="Banner3">
											  		<input type="hidden" name="BannerGUID" value="{{ $banners[2]->BannerGUID }}">
												    <tr>
											    			<th scope="col">Title</th>
											    			<td>
											    				<textarea id="bTitle3" name="BannerTitle" rows="2" cols="50">{{ $banners[2]->Title }}</textarea>
											    			</td>
												    </tr>
												    <tr>
												    		<th scope="col">Description</th>
												    		<td>
											    				<textarea id="bDesc3" name="BannerDesc" rows="2" cols="50">{{ $banners[2]->Description }}</textarea>
											    			</td>
												    </tr>
												    <tr>
												    		<th scope="col">Banner</th>
												    		<td><img src="{{ $banners[2]->BannerURL }}?v={{ time() }}" style="width:300px; height: 200px;" class="mb-2" id="Banner3Img">
												      		<input class="form-control" type="file" id="UploadBanner3Image" accept="image/png, image/jpeg" onchange="readBannerURL(this,'Banner3Img');" name="UploadBannerImage" data-id="Banner3Img"></td>
												    </tr>
												    <tr>
												    		<th scope="col">Mobile Banner</th>
												    		<td><img src="{{ $banners[2]->MobileBannerURL }}?v={{ time() }}" style="width:200px; height: 250px;" class="mb-2" id="MobileBanner3Img">
												      		<input class="form-control" type="file" id="UploadMobileBanner3Image" accept="image/png, image/jpeg" onchange="readBannerURL(this,'MobileBanner3Img');" name="UploadMobileBannerImage" data-id="MobileBanner3Img"></td>
												    </tr>
												    <tr>
												    	<td></td>
												    	<td><input type="submit" class="btn btn-success w-100" value="Update"></td>
												    </tr>
											    </form>
											  </tbody>
											</table>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                     Banner 4
                    </button>
                  </h2>
                  <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <table class="table table-bordered">
							<tbody>
							<form class="bannerForm">
								<input type="hidden" name="BannerName" value="Banner4">
								<input type="hidden" name="BannerGUID" value="{{ $banners[3]->BannerGUID }}">
								<tr>
										<th scope="col">Title</th>
										<td>
											<textarea id="bTitle4" name="BannerTitle" rows="2" cols="50">{{ $banners[3]->Title }}</textarea>
										</td>
								</tr>
								<tr>
										<th scope="col">Description</th>
										<td>
											<textarea id="bDesc4" name="BannerDesc" rows="2" cols="50">{{ $banners[3]->Description }}</textarea>
										</td>
								</tr>
								<tr>
										<th scope="col">Banner</th>
										<td><img src="{{ $banners[3]->BannerURL }}?v={{ time() }}" style="width:300px; height: 200px;" class="mb-2" id="Banner4Img">
										<input class="form-control" type="file" id="UploadBanner4Image" accept="image/png, image/jpeg" onchange="readBannerURL(this,'Banner4Img');" name="UploadBannerImage" data-id="Banner4Img"></td>
								</tr>
								<tr>
										<th scope="col">Mobile Banner</th>
										<td><img src="{{ $banners[3]->MobileBannerURL }}?v={{ time() }}" style="width:200px; height: 250px;" class="mb-2" id="MobileBanner4Img">
										<input class="form-control" type="file" id="UploadMobileBanner4Image" accept="image/png, image/jpeg" onchange="readBannerURL(this,'MobileBanner4Img');" name="UploadMobileBannerImage" data-id="MobileBanner4Img"></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" class="btn btn-success w-100" value="Update"></td>
								</tr>
							</form>
							</tbody>
						</table>
                    </div>
                  </div>
                </div>
              </div><!-- End Default Accordion Example -->

            </div>
          </div>

        </div>
      </div>
    </section>
    <script type="text/javascript">
    	function readBannerURL(input,target) {
		    if (input.files && input.files[0]) {
		      var reader = new FileReader();
		      reader.onload = function (e) {
		        $('#'+target).attr('src', e.target.result);
		      };

		      reader.readAsDataURL(input.files[0]);
		    }
	  	}

	  	$(".bannerForm").submit(function(e){
        e.preventDefault();
        var formData = new FormData(this)
        $.ajax({
          url:"{{ route('UpdateBanner') }}",
          method: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response){
            alert("Banner has been updated successfully.");
            window.location.href = "{{ route('activebanners') }}";
          }
        })
      })
    </script>
@endsection