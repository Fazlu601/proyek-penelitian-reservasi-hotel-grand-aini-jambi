<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            box-sizing: border-box;
        }
    </style>
</head>
<body>

    <div class="container" style="margin:0 30px;height:100vh;">
        <div class="row">
            <div class="title" style="border-bottom:3px solid black;padding-bottom:5px; text-align:center;margin-top:30px;">
                <h1 style="padding: 0;margin:0;">GRAND AINI HOTEL <br> </h1>
                <p style="padding: 0;margin:0;font-size:14px;font-wight:bolder;">Boutique Hotel Jambi</p>
                <p style="padding: 2px;margin:0;font-size:14px;">Telp : (08956 3939 4873)</p>
            </div>
        </div>
        <div class="row">
            <table border="1" cellspacing="0" cellpadding="5" style="margin: 0 auto;width:800px;border:1px solid black;margin-top:30px;">
                <tbody>
                    <tr>
                        <th align="center">
                            <h4>No. </h4>
                        </th>
                        <th align="center">
                            <h4>Periode</h4>
                        </th>
                        <th align="center">
                            <h4>Pendapatan</h4>
                        </th>
                    </tr>
                    <tr>
                        <td align="center">
                            <h4>1</h4>
                        </td>
                        <td align="center">
                            <h4>{{ $bulan }}</h4>
                        </td>
                        <td align="center">
                            <h4>Rp. {{ number_format($total_pendapatan,0,",","."); }}</h4>
                        </td>
                    </tr>
                      
                </tbody>
            </table>
        </div>
        <div class="row" style="transform: translateY(150px)">
            <div class="tanda-tangan" style="text-align:center;">
                    <p style="margin-bottom: 80px">Pemilik</p>
                    <p>Teguh Darmanto</p>
            </div>
        </div>
    </div>
    
</body>
</html>