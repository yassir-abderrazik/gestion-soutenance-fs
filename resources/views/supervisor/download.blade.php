<!DOCTYPE html>
<html>
@forelse($defense as $data)

<head>
    <title>Form</title>
    <style>
        #formulaire {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }


        #formulaire td
         {
            border: 1px solid #ddd;
            padding: 8px;
            line-height: 40px;
        }
        #formulaire tr:nth-child(even) {
            background-color: #f2f2f2;
        }



        .sign {
            padding-left: 32rem;
        }

        .img {
            padding-left: 30rem;
        }

        footer {
            padding-top: 8rem;
        }

        .footer {
            padding-left: 30rem;
            padding-top: 5rem;
        }
    </style>
</head>

<body>

    <h1 style="margin-left: 14rem;">Reçu de soutenance</h1><br><br>
    <table id="formulaire">
        <tr>
            <td><strong>Prénom : </strong>{{ $data->firstname}}</td>
            <td><strong>Nom : </strong>{{ $data->lastname}}</td>
        </tr>
        <tr>
            <td><strong>E-mail : </strong>{{ $data->email}}</td>
            <td><strong>Téléphone : </strong>{{ $data->phone}}</td>
        </tr>
        <tr>
            <td><strong>filiére : </strong>{{ $data->faculty}}</td>
            <td><strong>Résumé : </strong>{{ $data->summary}}</td>
        </tr>
        <tr>
            <td><strong>Projet : </strong>{{ $data->project}}</td>
            <td><strong>Date de soutenance : </strong>{{ $data->jury->dateDefense}}</td>
        </tr>
        <tr>
            <td><strong>Le président : </strong>{{ $data->jury->presidentName}}</td>
            <td><strong>Président établissement : </strong>{{ $data->jury->presidentUniversity}}</td>
        </tr>
        <tr>
            <td><strong>L’examinateur : </strong>{{ $data->jury->examinerName}}</td>
            <td><strong>Examinateur établissement : </strong>{{ $data->jury->examinerUniversity}}</td>
        </tr>
        <tr>
            <td><strong>L’invité : </strong>{{ $data->jury->guestName}}</td>
            <td><strong>Invité établissement : </strong>{{ $data->jury->guestUniversity}}</td>
        </tr>


    </table>
    <footer>
        <br><br>
        <div class="sign">
            <h3>Signature :</h3>
        </div>
        <div class="footer">
            <hr>
            <p>{{ date('Y-m-d H:i:s') }}</p>
        </div>
    </footer>
</body>
@empty
no form
@endforelse

</html>
