<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>Pengajuan Surat Pengantar oleh {{ $surat->warga->nama }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
	<meta content="Themesbrand" name="author" />
	<!-- App favicon -->
	<link rel="shortcut icon" href="{{ URL::asset('assets/img/favicon.png') }}">
	<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" id="bootstrap-light" rel="stylesheet" type="text/css" />
	<style type="text/css">
		body {
			width: 100%;
			height: 100%;
			margin: 0 auto;
			background-color: #FFFFFF;
			font: 12pt "Times New Roman";
		}
		* {
			box-sizing: border-box;
			-moz-box-sizing: border-box;
		}

		page {
			background: white;
			display: block;
			margin: 0 auto;
		}

		page[size="A4"] {
            color: black;
			width: 21cm;
		}

		@media print {
			html, body {
				width: 210mm;
				height: 297mm;
				margin: 0;
				padding: 0;
			}
		}

        h1, h2, h3, h4, h5 {
            font-family: 'Times New Roman', Times, serif
        }
	</style>
</head>

<body>
	<page size="A4">
		<div class="row">
			{{-- <div class="col-2">
				<img class="mt-5 ml-2" src="" width="100%" alt="leftLogo">
			</div> --}}
			<div class="col-12">
				<h5 class="mt-5 text-center">PEMERINTAH {{ strtoupper($setting->kab_kota) }}</h5>
				<h5 class="mt-2 text-center">KECAMATAN {{ strtoupper($setting->kecamatan) }} - {{ strtoupper($setting->desa_kelurahan) }}</h5>
				<h4 class="mt-2 text-center">RUKUN TETANGGA (RT) {{ $setting->rt }} - RUKUN WARGA (RW) {{ $setting->rw }}</h4>
				<p class="text-center mb-0">Alamat: {{ $setting->alamat }}, Website: {{ $setting->website }}</p>
			</div>
		</div>
		<hr>
		<div class="pl-3 pr-3 mt-3">
			<div class="row">
				<div class="col-12">
					<h3 class="text-center mb-0" style="text-decoration: underline">SURAT PENGANTAR</h3>
					<p class="text-center">NOMOR: {{ $surat->no_surat }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
                    <p class="mb-0">Yang bertanda tangan di bawah ini Ketua Rukun Tetangga (RT) {{ $setting->rt }} - Rukun Warga (RW) {{ $setting->rw }} {{ $setting->desa_kelurahan }}, Kecamatan {{ $setting->kecamatan }}, {{ $setting->kab_kota }}, menerangkan bahwa:</p>
				</div>
			</div>
            <div class="row">
                <div class="col-12" style="margin-left: 2em">
                    <table>
                        <tr>
                            <td style="min-width: 12em">Nama</td>
                            <td>: {{ $surat->warga->nama }}</td>
                        </tr>
                        <tr>
                            <td style="min-width: 12em">Jenis Kelamin</td>
                            <td>: {{ $surat->warga->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <td style="min-width: 12em">Tempat, tanggal lahir</td>
                            <td>: {{ $surat->ttl_ahli_waris }}</td>
                        </tr>
                        <tr>
                            <td style="min-width: 12em">NIK</td>
                            <td>: {{ $surat->nik_ahli_waris }}</td>
                        </tr>
                        <tr>
                            <td style="min-width: 12em">Pekerjaan</td>
                            <td>: {{ $surat->warga->pekerjaan }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="mb-0">adalah benar warga RT. {{ $setting->rt }} - RW.{{ $setting->rw }}, Kecamatan {{ $setting->kecamatan }}, {{ $setting->kab_kota }}, dan berdasarkan data yang ada, yang bersangkutan adalah ahli waris dari:</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12" style="margin-left: 2em">
                    <table>
                        <tr>
                            <td style="min-width: 12em">Nama</td>
                            <td>: {{ $surat->wargaku->nama }}</td>
                        </tr>
                        <tr>
                            <td style="min-width: 12em">Jenis Kelamin</td>
                            <td>: {{ $surat->wargaku->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <td style="min-width: 12em">Tempat, tanggal lahir</td>
                            <td>: {{ $surat->ttl_pewaris }}</td>
                        </tr>
                        <tr>
                            <td style="min-width: 12em">NIK</td>
                            <td>: {{ $surat->nik_pewaris }}</td>
                        </tr>
                        <tr>
                            <td style="min-width: 12em">Pekerjaan</td>
                            <td>: {{ $surat->wargaku->pekerjaan }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="mt-3">Surat ini dibuat untuk keperluan pengurusan Surat Keterangan Ahli Waris.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>Demikian surat pengantar ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-right">
                    <p>{{ $setting->desa_kelurahan }}, {{ now()->translatedFormat('d F Y') }}</p>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-11 text-right">
                    <img src= "{{ asset($setting->tanda_tangan) }}" alt="Tanda Tangan" style="width: 150px;">
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-10 text-right">
                    <p>Syaiful Bahri</p>
                </div>
            </div>
		</div>
	</page>
	<script src="{{ URL::asset('assets/libs/jquery/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js') }}"></script>
	<script type="text/javascript">
		window.print();
	</script>
</body>

</html>