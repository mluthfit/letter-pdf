<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
  <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <TITLE>Surat Izin {{ $letter->nama_pengirim }}</TITLE>
    <META name="generator" content="BCL easyConverter SDK 5.0.252">
    <META name="author" content="Luthfi Muhammad">
    <STYLE type="text/css">

    body {margin-top: 0px;margin-left: 0px;}

    #page_1 {position:relative; overflow: hidden;margin: 99px 0px 281px 0px;padding: 0px;border: none;width: 816px;}

    .ft0{font: 15px 'Calibri';line-height: 18px;}
    .ft1{font: 14px 'Calibri';line-height: 17px;}

    .p0{text-align: right;padding-right: 150px;margin-top: 0px;margin-bottom: 0px;}
    .p1{text-align: left;padding-left: 20px;margin-top: 35px;margin-bottom: 0px;}
    .p2{text-align: left;padding-left: 20px;margin-top: 12px;margin-bottom: 0px;}
    .p3{text-align: left;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
    .p4{text-align: left;padding-left: 20px;padding-right: 150px;margin-top: 35px;margin-bottom: 0px;}
    .p5{text-align: left;padding-left: 20px;padding-right: 150px;margin-top: 20px;margin-bottom: 0px;}
    .p6{text-align: left;padding-left: 20px;margin-top: 40px;margin-bottom: 0px;}
    .p7{text-align: left;padding-left: 20px;margin-top: 60px;margin-bottom: 0px;}

    .td0{padding: 0px;margin: 0px;width: 144px;vertical-align: bottom;}
    .td1{padding: 0px;margin: 0px;width: 235px;vertical-align: bottom;}

    .tr0{height: 18px;}
    .tr1{height: 29px;}
    .tr2{height: 34px;}

    .t0{width: 379px;margin-left: 20px;margin-top: 9px;font: 15px 'Calibri';}

    </STYLE>
  </HEAD>
  <BODY>
    <DIV id="page_1">
      <P class="p0 ft0">{{ $letter->daerah_surat }}, {{ $letter->tanggal_surat }}</P>
      <P class="p1 ft0">Yang terhormat,</P>
      <P class="p2 ft0">Kepala Bagian SDM (Sumber Daya Manusia)</P>
      <P class="p2 ft0">{{ $letter->nama_perusahaan }}</P>
      <P class="p2 ft0">{{ $letter->alamat_perusahaan }}</P>
      <P class="p1 ft0">Dengan hormat,</P>
      <P class="p2 ft0">Yang bertanda tangan di bawah ini :</P>
      <TABLE cellpadding=0 cellspacing=0 class="t0">
        <TR>
          <TD class="tr0 td0"><P class="p3 ft0">Nama Lengkap</P></TD>
          <TD class="tr0 td1"><P class="p3 ft0">: {{ $letter->nama_pengirim }}</P></TD>
        </TR>
        <TR>
          <TD class="tr1 td0"><P class="p3 ft0">Alamat</P></TD>
          <TD class="tr1 td1"><P class="p3 ft1">: {{ $letter->alamat_pengirim }}</P></TD>
        </TR>
        <TR>
          <TD class="tr2 td0"><P class="p3 ft0">Jabatan</P></TD>
          <TD class="tr2 td1"><P class="p3 ft0">: {{ $letter->jabatan_pengirim }}</P></TD>
        </TR>
      </TABLE>
      <P class="p4 ft0">Memohon izin untuk tidak masuka kerja pada tanggal {{ $letter->tanggal_surat }} sehubungan dengan {{ strtolower($letter->alasan_izin) }}. Saya bermaksud memohon kebijaksanaan dari bapak/ibu pemimpin untuk berkenan memberikan izin tidak masuk dalam bertugas pada hari ini.</P>
      <P class="p5 ft0">Demikian permohonan izin tidak masuk kerja yang saya sampaikan, atas perhatian dan kebijaksanaannya saya ucapkan terima kasih.</P>
      <P class="p6 ft0">Hormat saya,</P>
      <P class="p7 ft0">{{ $letter->nama_pengirim }}</P>
    </DIV>
  </BODY>
</HTML>