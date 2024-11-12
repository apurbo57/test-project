<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>Certificate</title>
    <style>

        *,p {
            margin: 0;
            padding: 0;
        }

        /* Set body style with background image*/
        body {
            background-image: url(data:image/svg+xml;base64,<?php echo base64_encode(file_get_contents(base_path('public/images/certificate.jpg'))); ?>);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        @font-face{
            font-family: "Edwardian";
            font-style: normal;
            font-weight: normal;
            src : url("{{base_path('public/fonts/Edwardian.ttf')}}") format('truetype');;
        }

        .edwardian{
            font-family: "Edwardian";
        }
    </style>
</head>

<body>
    <div class="certificate_bg">

        <div class="details" style="margin-top: 20rem; ">

            <h2 style="text-align:center"> {{$data->course_name}}</h2>
            <p class="edwardian" style="text-align:center;font-size: 4rem;padding-top: -20px">{{$data->student_name}}</p>
            <div style="margin-left: 9.5rem; margin-right:9.5rem; font-size:1.2rem">
                <p>{{$data->description}}</p>
            </div>
            <div style="margin-top:8.6rem; text-align:center">
                <p>Reg No: Sydtc-{{$data->reg_id}}</p>
                <p>Certificate No: 0{{$data->id}}</p>
            </div>


        </div>
    </div>
</body>

</html>
