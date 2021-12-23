<!DOCTYPE html>
<html>
    <head>
        <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    </head>
    <body>
        <style type="text/css">
            table tr td,
            table tr th{
                font-size: 9pt;
            }
        </style>
            <h4 align="center">MEMBER REPORT</h4>
        <b>Name</b> : {{ $member->name }} <br>
        <b>NIM</b> : {{ $member->nim }} <br>
        <b>Class</b> : {{ $member->class }} <br>
        <b>Department</b> : {{ $member->department }} <br>
        <b>Phone Number</b> : {{ $member->phone_number }}<br>
    </body>
</html>