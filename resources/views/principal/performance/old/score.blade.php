@extends('layouts.teacher')
@section('content')
<div class="min-h-screen bg-gray-200 py-3">
  <a href="/principal/performance/show/{{$idpt}}">
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
              <td class="px-4 py-3 text-ms border font-semibold">Nama</td>
              <td class="px-4 py-3 text-ms border">{{$data->refActivityCreditScore->grain_item}} {{$data->refActivityCreditScore->sub_grain_item}}</td>
            </tr>
            <tr class="text-gray-700 text-center">
              <td class="px-4 py-3 text-ms border font-semibold">Target Angka Kredit</td>
              <td class="px-4 py-3 text-ms border">{{$data->target_credit_score}}</td>
            </tr>
            <tr class="text-gray-700 text-center">
              <td class="px-4 py-3 text-ms border font-semibold">Target Kuantitas / Output</td>
              <td class="px-4 py-3 text-ms border">{{$data->target_qty}} {{$data->target_output}}</td>
            </tr>
            <tr class="text-gray-700 text-center">
              <td class="px-4 py-3 text-ms border font-semibold">Target Kualitas</td>
              <td class="px-4 py-3 text-ms border">{{$data->target_quality}}</td>
            </tr>
            <tr class="text-gray-700 text-center">
              <td class="px-4 py-3 text-ms border font-semibold">Target Waktu</td>
              <td class="px-4 py-3 text-ms border">{{$data->target_time}} {{$data->target_time_unit}}</td>
            </tr>
            <tr class="text-gray-700 text-center">
              <td class="px-4 py-3 text-ms border font-semibold">Target Biaya</td>
              <td class="px-4 py-3 text-ms border">{{$data->target_cost}}</td>
            </tr>
            <tr class="text-gray-700 text-center">
              <td class="px-4 py-3 text-ms border font-semibold">File</td>
              <td class="px-4 py-3 text-ms border">
                <a href="{{ asset('storage/performancetarget/activity/' . $data->file) }}">
                  {{$data->file}}
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="md:flex md:justify-center md:space-x-8 md:px-14 bg-white mt-10">
        <form action="{{ route('principalptscoreact', array($data->id, $idpt))}}" method="POST" class="w-full max-w-lg mt-10">
          <h1 class="mb-12 text-center text-2xl text-black font-bold">Form Penilaian</h1>
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
          <div class="flex flex-col -mx-3 mb-6">
            <div class="w-full px-3">
              <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                Realisasi Kuantitas
              </label>
              <input name="realization_qty" id="realization_qty" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" required>
            </div>
          </div>
          <div class="flex flex-col -mx-3 mb-6">
            <div class="w-full px-3">
              <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                Realisasi Kualitas
              </label>
              <input name="realization_quality" id="realization_quality" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" required>
            </div>
          </div>
          <div class="flex flex-col -mx-3 mb-6">
            <div class="w-full px-3">
              <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                Realisasi Waktu
              </label>
              <input name="realization_time" id="realization_time" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="number" required>
            </div>
          </div>
          <div class="flex flex-col -mx-3 mb-6">
            <div class="w-full px-3">
              <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                Realisasi Unit Waktu
              </label>
              <select name="realization_time_unit" id="realization_time_unit" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                <option>Pilih Unit Waktu</option>
                <option value="Hari">Hari</option>
                <option value="Bulan">Bulan</option>
              </select>
            </div>
          </div>
          <div class="flex flex-col -mx-3 mb-6">
            <div class="w-full px-3">
              <label class="block dark:text-white uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                Realisasi Biaya
              </label>
              <input name="realization_cost" id="realization_cost" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" required>
            </div>
          </div>
          <div class="md:flex md:items-center mb-10">
            <div class="md:w-1/3">
              <button class="shadow bg-green-600 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                Submit
              </button>
              <button onclick="window.location='{{ url ('/principal/performance/show', array("$id")) }}'" class="shadow bg-red-600 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                Cancel
              </button>
            </div>
            <div class="md:w-2/3"></div>
          </div>
        </form>
      </div>
  </div>
</div>
</div>
</div>
<script>
var rupiah = document.getElementById('realization_cost');
rupiah.addEventListener('keyup', function(e){
  // tambahkan 'Rp.' pada saat form di ketik
  // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
  rupiah.value = formatRupiah(this.value, 'Rp. ');
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix){
  var number_string = angka.replace(/[^,\d]/g, '').toString(),
  split   		= number_string.split(','),
  sisa     		= split[0].length % 3,
  rupiah     		= split[0].substr(0, sisa),
  ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if(ribuan){
    separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
  }

  rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
  return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
</script>
@endsection
