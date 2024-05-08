<!DOCTYPE html>
<html>
<head>
	<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
</head>
<body>
</body>
<script type="text/javascript">
    // $('#downloadBtn').click(function(){
    //     console.log("Yes");
    //     // fetch(window.location.origin + "/DownloadOrderProductFiles/c42bb981-7956-4387-8f44-d542f405c83c")
    //     // .then(response => response.blob())
    //     // .then(blob => {
    //     //   const url = window.URL.createObjectURL(blob);
    //     //   const a = document.createElement('a');
    //     //   a.href = url;
    //     //   a.download = 'downloaded_file.zip';
    //     //   document.body.appendChild(a);
    //     //   a.click();
    //     //   a.remove();
    //     //   window.URL.revokeObjectURL(url);
    //     // })
    //     // .catch(error => {
    //     //   // Handle errors
    //     // });
    // });

    $(document).ready(function(){
        var param = (window.location.href).split('/');

    	fetch("https://aidea.vanguardbuffle.com/DownloadOrderProductFiles/" + param.slice(-1))
        .then(response => response.blob())
        .then(blob => {
          const url = window.URL.createObjectURL(blob);
          const a = document.createElement('a');
          a.href = url;
          a.download = 'ProductFile.zip';
          document.body.appendChild(a);
          a.click();
          a.remove();
          window.URL.revokeObjectURL(url);
        })
        .catch(error => {
          // Handle errors
        });
    });

    function click()
    {
        console.log("CLick");
    }
</script>
</html>