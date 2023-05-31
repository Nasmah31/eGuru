@extends('layouts.teacher')
@section('content')
<div class="min-h-screen bg-gray-200 py-3">
  <a href="/teacher/newperformance/show/{{$idpt}}">
    <button class="block text-green-500 rounded-sm font-bold py-4 px-6 mr-2 flex items-center hover:bg-green-500 hover:text-white">
      <svg class="h-5 w-5 mr-2 fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
        <path id="XMLID_10_" d="M438,372H36.355l72.822-72.822c9.763-9.763,9.763-25.592,0-35.355c-9.763-9.764-25.593-9.762-35.355,0 l-115.5,115.5C-46.366,384.01-49,390.369-49,397s2.634,12.989,7.322,17.678l115.5,115.5c9.763,9.762,25.593,9.763,35.355,0 c9.763-9.763,9.763-25.592,0-35.355L36.355,422H438c13.808,0,25-11.193,25-25S451.808,372,438,372z"></path>
      </svg>
    </button>
  </a>
  <div class="px-5 mx-auto max-w-7x1">
    <h1 class="mb-12 text-center text-4xl text-black font-bold">Kegiatan Tugas Jabatan</h1>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
      <div class="w-full overflow-x-auto">
        <table class="w-full">
          <tbody class="bg-white">
            <tr class="text-gray-700 text-center">
              <td class="px-4 py-3 text-ms border font-semibold">Rencana Kinerja Atasan Langung Yang Diintervensi</td>
              <td class="px-4 py-3 text-ms border">{{$data->refPerformanceElement->direct_supervisor_performance_plan}}</td>
            </tr>
            <tr class="text-gray-700 text-center">
              <td class="px-4 py-3 text-ms border font-semibold">Rencana Kinerja</td>
              <td class="px-4 py-3 text-ms border">{{$data->refPerformanceElement->performance_plan}}</td>
            </tr>
            <tr class="text-gray-700 text-center">
              <td class="px-4 py-3 text-ms border font-semibold">Butir Kegiatan</td>
              <td class="px-4 py-3 text-ms border">{{$data->refPerformanceElement->activity_item}}</td>
            </tr>
            <tr class="text-gray-700 text-center">
              <td class="px-4 py-3 text-ms border font-semibold">Target Angka Kredit</td>
              <td class="px-4 py-3 text-ms border">{{$data->target_credit_score}}</td>
            </tr>
            <tr class="text-gray-700 text-center">
              <td class="px-4 py-3 text-ms border font-semibold">Target Kuantitas</td>
              <td class="px-4 py-3 text-ms border">{{$data->target_qty}} {{$data->refPerformanceElement->quantity}}</td>
            </tr>
            <tr class="text-gray-700 text-center">
              <td class="px-4 py-3 text-ms border font-semibold">Target Mutu</td>
              <td class="px-4 py-3 text-ms border">{{$data->target_quality}}% {{$data->refPerformanceElement->quality}}</td>
            </tr>
            <tr class="text-gray-700 text-center">
              <td class="px-4 py-3 text-ms border font-semibold">Target Waktu</td>
              <td class="px-4 py-3 text-ms border">{{$data->target_time}} Bulan {{$data->refPerformanceElement->time}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="flex items-center justify-center mt-10">
        <div class="w-full max-w-md mr-4">
          <form action="{{ route('teachernptproof', array($data->id, $idpt))}}" enctype="multipart/form-data" method="POST" class="bg-white shadow-lg rounded px-12 pt-6 pb-8 mb-4 border-2 border-green-500">
            @csrf
            <div class="text-gray-800 text-2xl flex justify-center border-b-2 py-2 mb-4">
              Upload File Bukti
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label class="w-64 flex flex-col w-full items-center px-4 py-6 bg-yellow-400 text-white rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-yellow-500 hover:text-white">
                  <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                  </svg>
                  <span class="mt-2 text-base leading-normal">Select a file</span>
                  <input type='file' id="file" name="file" hidden>
                </label>
                <span id="file_name"></span>
              </div>
            </div>
          <div class="flex items-center justify-center mt-6">
            <button class="shadow bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
              Upload
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<script>
let file = document.getElementById('file');
let file_name = document.getElementById('file_name');

file.addEventListener('change', function(){
  if(this.files.length)
      file_name.innerText = this.files[0].name;
  else
      file_name.innerText = '';
});
</script>
@endsection
