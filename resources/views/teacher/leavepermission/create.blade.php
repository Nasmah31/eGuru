@extends('layouts.teacher')
@section('content')
<div class="min-h-screen bg-white py-14">
  <div class="px-5 mx-auto max-w-7x1">
    <h1 class="mb-12 text-center text-4xl text-black font-bold">Form Pengajuan Cuti</h1>
    <div class="md:flex md:justify-center md:space-x-8 md:px-14">
      <form action="/teacher/leavepermission/store" method="POST" class="w-full max-w-lg" enctype="multipart/form-data">
        @csrf
        @if(session('errors'))
        @foreach ($errors->all() as $error)
        <div class="bg-red-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center">
          <svg viewBox="0 0 24 24" class="text-red-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
            <path fill="currentColor"  d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z"></path>
          </svg>
          <span class="text-red-800">{{ $error }}</span>
        </div>
        @endforeach
        @endif
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Jenis Cuti <span class="text-xs text-red-500"><i>*required</i></span>
            </label>
            <select name="leave_type_id" id="leave_type_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
              <option value="0">Pilih Jenis Cuti</option>
              @foreach($leavetypes as $leavetype)
              <option value="{{$leavetype->id}}">{{$leavetype->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div id="leave_year" class="flex flex-wrap -mx-3 mb-6" style="display:none;">
          <div class="w-full px-3">
            <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Tahun Cuti <span class="text-xs text-red-500"><i>*required</i></span>
            </label>
            <input name="leave_year" placeholder="Masukkan Tahun Cuti"  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"   >
              File Surat Rekomendasi <span class="text-xs text-red-500"><i>*required</i></span>
            </label>
            <label class="w-64 flex flex-col w-full items-center px-4 py-6 bg-yellow-400 text-white rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-yellow-500 hover:text-white">
              <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
              </svg>
              <span class="mt-2 text-base leading-normal">Select a file</span>
              <input type='file' id="file_recommendation_letter" name="file_recommendation_letter" hidden>
            </label>
            <span id="file_recommendation_letter_name"></span>
            <div class="container mt-3" id="alertbox">
              <div class="container bg-red-500 flex items-center text-white text-sm font-bold px-4 py-3 relative"
              role="alert">
              <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
              </svg>
              <p>File Berekstensi *.pdf Dengan Maksimal Size 2MB</p>
            </div>
          </div>
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"   >
              File Surat Permohonan <span class="text-xs text-red-500"><i>*required</i></span>
            </label>
            <label class="w-64 flex flex-col w-full items-center px-4 py-6 bg-yellow-400 text-white rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-yellow-500 hover:text-white">
              <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
              </svg>
              <span class="mt-2 text-base leading-normal">Select a file</span>
              <input type='file' id="file_leave_application" name="file_leave_application" hidden>
            </label>
            <span id="file_leave_application_name"></span>
            <div class="container mt-3" id="alertbox">
              <div class="container bg-red-500 flex items-center text-white text-sm font-bold px-4 py-3 relative"
              role="alert">
              <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
              </svg>
              <p>File Berekstensi *.pdf Dengan Maksimal Size 2MB</p>
            </div>
          </div>
          </div>
        </div>
        <div id="file_temporary_permissionn" class="flex flex-wrap -mx-3 mb-6" style="display:none;">
          <div class="w-full px-3">
            <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"   >
              File Surat Ijin Sementara <span class="text-xs text-red-500"><i>*required</i></span>
            </label>
            <label class="w-64 flex flex-col w-full items-center px-4 py-6 bg-yellow-400 text-white rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-yellow-500 hover:text-white">
              <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
              </svg>
              <span class="mt-2 text-base leading-normal">Select a file</span>
              <input type='file' id="file_temporary_permission" name="file_temporary_permission" hidden>
            </label>
            <span id="file_temporary_permission_name"></span>
            <div class="container mt-3" id="alertbox">
              <div class="container bg-red-500 flex items-center text-white text-sm font-bold px-4 py-3 relative"
              role="alert">
              <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
              </svg>
              <p>File Berekstensi *.pdf Dengan Maksimal Size 2MB</p>
            </div>
          </div>
          </div>
        </div>
        <div id="file_prooff" class="flex flex-wrap -mx-3 mb-6" style="display:none;">
          <div class="w-full px-3">
            <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"   >
              File Bukti Lainnya <span class="text-xs text-red-500"><i>*required</i></span>
            </label>
            <label class="w-64 flex flex-col w-full items-center px-4 py-6 bg-yellow-400 text-white rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-yellow-500 hover:text-white">
              <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
              </svg>
              <span class="mt-2 text-base leading-normal">Select a file</span>
              <input type='file' id="file_proof" name="file_proof" hidden>
            </label>
            <span id="file_proof_name"></span>
            <div class="container mt-3" id="alertbox">
              <div class="container bg-red-500 flex items-center text-white text-sm font-bold px-4 py-3 relative"
              role="alert">
              <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
              </svg>
              <p>File Berekstensi *.pdf Dengan Maksimal Size 2MB</p>
            </div>
          </div>
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Alasan Cuti <span class="text-xs text-red-500"><i>*required</i></span>
            </label>
            <textarea name="leave_excuse" id="leave_excuse" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" required></textarea>
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Tanggal Mulai Cuti <span class="text-xs text-red-500"><i>*required</i></span>
            </label>
            <input name="start_date" id="start_date" placeholder="Masukkan Tanggal Mulai Cuti" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" required>
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Tanggal Selesai Cuti <span class="text-xs text-red-500"><i>*required</i></span>
            </label>
            <input name="end_date" id="end_date" placeholder="Masukkan Tanggal Selesai Cuti" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" required>
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Alamat Selama Cuti <span class="text-xs text-red-500"><i>*required</i></span>
            </label>
            <input name="leave_address" id="leave_address" placeholder="Masukkan Alamat Selama Cuti" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" required>
          </div>
        </div>
        <div class="md:flex md:items-center">
          <div class="md:w-1/3">
            <button class="shadow bg-green-600 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
              Submit
            </button>
            <button onclick="window.location='{{ url ('/teacher/leavepermission') }}'" class="shadow bg-red-600 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
              Cancel
            </button>
          </div>
          <div class="md:w-2/3"></div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
$( function() {
  $( "#start_date" ).datepicker({
    dateFormat: "dd-mm-yy",
    changeMonth: true,
    changeYear: true,
  });
});
</script>
<script>
$( function() {
  $( "#end_date" ).datepicker({
    dateFormat: "dd-mm-yy",
    changeMonth: true,
    changeYear: true,
  });
});
</script>
<script>
   var konten = document.getElementById("leave_excuse");
     CKEDITOR.replace(konten,{
     language:'en-gb'
   });
   CKEDITOR.config.allowedContent = true;
</script>
<script>
    $('#leave_type_id').on('change', function () {
        if (this.value === '1'){
            $("#leave_year").show();
            $("#file_temporary_permissionn").hide();
            $("#file_prooff").hide();
        } else if (this.value === '2'){
            $("#leave_year").show();
            $("#file_temporary_permissionn").hide();
            $("#file_prooff").hide();
        } else if (this.value === '3'){
            $("#leave_year").hide();
            $("#file_temporary_permissionn").show();
            $("#file_prooff").show();
        } else if (this.value === '4'){
            $("#leave_year").hide();
            $("#file_temporary_permissionn").show();
            $("#file_prooff").show();
        } else if (this.value === '5'){
            $("#leave_year").hide();
            $("#file_temporary_permissionn").show();
            $("#file_prooff").show();
        } else {
            $("#leave_year").hide();
            $("#file_temporary_permissionn").hide();
            $("#file_prooff").hide();
        }
    });
</script>
<script>
let file_recommendation_letter = document.getElementById('file_recommendation_letter');
let file_recommendation_letter_name = document.getElementById('file_recommendation_letter_name');

file_recommendation_letter.addEventListener('change', function(){
  if(this.files.length)
      file_recommendation_letter_name.innerText = this.files[0].name;
  else
      file_recommendation_letter_name.innerText = '';
});
</script>

<script>
let file_leave_application = document.getElementById('file_leave_application');
let file_leave_application_name = document.getElementById('file_leave_application_name');

file_leave_application.addEventListener('change', function(){
  if(this.files.length)
      file_leave_application_name.innerText = this.files[0].name;
  else
      file_leave_application_name.innerText = '';
});
</script>

<script>
let file_temporary_permission = document.getElementById('file_temporary_permission');
let file_temporary_permission_name = document.getElementById('file_temporary_permission_name');

file_temporary_permission.addEventListener('change', function(){
  if(this.files.length)
      file_temporary_permission_name.innerText = this.files[0].name;
  else
      file_temporary_permission_name.innerText = '';
});
</script>

<script>
let file_proof = document.getElementById('file_proof');
let file_proof_name = document.getElementById('file_proof_name');

file_proof.addEventListener('change', function(){
  if(this.files.length)
      file_proof_name.innerText = this.files[0].name;
  else
      file_proof_name.innerText = '';
});
</script>
@endsection
