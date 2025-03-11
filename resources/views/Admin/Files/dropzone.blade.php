@extends('layouts.app')
@php $lang = App::getLocale(); @endphp
@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
@endsection

@section('content')
  <form action="{{ route('dropzone.upload') }}" method="post" class="dropzone" id="my-dropzone">
    @csrf
  </form>


@endsection

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
  <script>
    Dropzone.options.myDropzone = {
      maxFilesize: 2, // MB
      acceptedFiles: ".jpeg,.jpg,.png,.gif,.svg",
      addRemoveLinks: true,
      dictRemoveFile: "Remove",
      init: function() {
        this.on("sending", function(file, xhr, formData) {
          // Append extra parameter
          formData.append("user_id", "12345");
        });
        this.on("success", function(file, response) {
          // Store the modified filename returned by the server
          console.log('response', response)
          file.serverFilename = response.filenames[0];
        });
        this.on("removedfile", function(file) {
          // Send the modified filename in the remove request
          $.ajax({
            type: 'POST',
            url: '{{ route('dropzone.remove') }}',
            data: {
              filename: file.serverFilename,
              _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
              console.log("File has been successfully removed!");
            },
            error: function(e) {
              console.log(e);
            }
          });
        });
      }
    };
  </script>

@endsection



