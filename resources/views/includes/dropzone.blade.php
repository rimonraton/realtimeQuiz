@if(isset($directory))
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
  <form action="{{ route('dropzone.upload') }}" method="post" class="dropzone" id="my-dropzone">
    @csrf
  </form>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
  <script>
    Dropzone.options.myDropzone = {
      @if(isset($message))
      dictDefaultMessage: "{{$message}}",
      @else
        dictDefaultMessage: "{{ __('form.dropzone_msg') }}",
      @endif
      @if(isset($maxFiles))
      maxFiles: "{{$maxFiles}}",
      @endif
      maxFilesize: {{ isset($maxSize) ? $maxSize: 2 }}, // MB
      acceptedFiles: "{{ isset($rules) ? $rules: '.jpeg,.jpg,.gif,.png,.svg, .pdf, .mp3, .mp4, .docx,.xlsx,.pptx,' }}",
      addRemoveLinks: true,
      dictRemoveFile: "{{ isset($removeMessage) ? $removeMessage: 'Remove' }}",
      init: function() {
        this.on("sending", function(file, xhr, formData) {
          // Append extra parameter
          formData.append("directory", "{{$directory}}");
        });
        this.on("success", function(file, response) {
          // Store the modified filename returned by the server
          file.serverFilename = response.path;
          // dropzoneCallback(response);
          @if(isset($callback))
          {{ $callback }} (response);
          @endif
        });
        this.on("removedfile", function(file) {
          // Send the modified filename in the remove request
          $.ajax({
            type: 'POST',
            url: '{{ route('dropzone.remove') }}',
            data: {
              filename: file.serverFilename,
              directory: "{{$directory}}",
              _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(data){
              console.log("File has been successfully removed!");
              // dropzoneCallback(data);
              @if(isset($callback))
                {{ $callback }} (data);
              @endif
            },
            error: function(e) {
              console.log(e);
            }
          });
        });
      }
    };
  </script>
  <style>
    /* Custom Dropzone Styles */
    #my-dropzone {
      border: 2px dashed #008CBA;
      background-color: #f0f8ff;
      padding: 20px;
      border-radius: 10px;
      transition: background-color 0.3s ease-in-out, border 0.3s ease-in-out;
    }

    #my-dropzone .dz-message {
      font-size: 18px;
      color: #008CBA;
      font-weight: bold;
    }

    #my-dropzone:hover {
      background-color: #e0f7fa;
      border-color: #00bcd4;
    }

    #my-dropzone .dz-preview .dz-error-message {
      color: #f44336;
      font-weight: bold;
    }

    #my-dropzone .dz-preview .dz-success-mark {
      color: #4caf50;
    }

    #my-dropzone .dz-preview .dz-error-mark {
      color: #f44336;
    }

  </style>

@else
  <h1 class="text-danger">Dropzone Directory Name is Required </h1>
@endif




