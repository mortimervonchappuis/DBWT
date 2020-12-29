<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Detailseite</title>
    <style>
        .content {
            display: grid;
            grid-template-columns: 33% 33% 33%;
            grid-template-rows: 25% 25% 25% 25%;
            grid-template-areas:
                "head1 head1 head1"
                "box1 box1 box1"
                "box2 box2 box2"
                "box3 box3 box3"
                "head2 head2 head2"
                "box4 box5 box6"
                "head3 head3 head3"
                ". box7 .";
        }

        h1{
            grid-area: head1;
        }

        h2{
            grid-area: head2;
        }

        h3{
            grid-area: head3;
        }

        .box-1 {
            grid-area: box1;
            background: red;
        }
        .box-2 {
            grid-area: box2;
            background: green;
        }
        .box-3 {
            grid-area: box3;
            background: lightblue;
        }
        .box-4 {
            grid-area: box4;
            background: red;

        }
        .box-5 {
            grid-area: box5;
            background: green;
            text-align: center;

        }
        .box-6 {
            grid-area: box6;
            background: lightblue;

        }
        .box-7 {
            grid-area: box7;
            background: black;
            color: white;
            justify-content: center;
        }

    </style>
</head>
<body>
    <div class="content">
        <h1>Drei Elemente untereinaber</h1>
        <div class="box-1">1. Element</div>
        <div class="box-2">2. Element</div>
        <div class="box-3">3. Element</div>

        <h2>Drei Element nebeneinaber</h2>
        <div class="box-4">1. Element</div>
        <div class="box-5">2. Element</div>
        <div class="box-6">3. Element</div>
        <h3>Ein Element zentriert</h3>
        <div class="box-7">Zentriert</div>
    </div>
</body>
</html>
