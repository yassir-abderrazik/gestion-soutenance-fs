<!DOCTYPE html>
<html>
@foreach($defense as $data)

<head>
    <title>Invitation</title>
    <style>
        div {
            border: 1px solid gray;
            padding: 8px;
        }

        h1 {
            text-align: center;
            text-transform: uppercase;
            color: #3944BC;
        }

        p {
            text-align: justify;
            font-family: "Times New Roman", Times, serif;

        }
        hr {
            border-bottom-style: dashed;
        }
    </style>
</head>

<body>
    <div>
        <h1>Invitation</h1>
        <p>Bonjour Mr/Mme <strong>{{ $data->jury->presidentName }}</strong>, Vous êtes invités à la soutenance de
            <strong>{{ $data->firstname}}
                {{ $data->lastname}} </strong>encadré Mr/Mme <strong>{{ $data->supervisor->name}}</strong>.<br>
            <center>La date du soutenance est : <strong>{{$data->jury->dateDefense}}</strong></center>
        </p>
    </div><br><br><br><hr><br><br><br>
    <div>
        <h1>Invitation</h1>
        <p>Bonjour Mr/Mme <strong>{{ $data->jury->examinerName }}</strong>, Vous êtes invités à la soutenance de
            <strong>{{ $data->firstname}}
                {{ $data->lastname}} </strong>encadré Mr/Mme <strong>{{ $data->supervisor->name}}</strong>.<br>
            <center>La date du soutenance est : <strong>{{$data->jury->dateDefense}}</strong></center>
        </p>
    </div><br><br><br><hr><br><br><br>
    <div>
        <h1>Invitation</h1>
        <p>Bonjour Mr/Mme <strong>{{ $data->jury->guestName }}</strong>, Vous êtes invités à la soutenance de
            <strong>{{ $data->firstname}}
                {{ $data->lastname}} </strong>encadré Mr/Mme <strong>{{ $data->supervisor->name}}</strong>.<br>
            <center>La date du soutenance est : <strong>{{$data->jury->dateDefense}}</strong></center>
        </p>
    </div>


</body>

@endforeach

</html>
